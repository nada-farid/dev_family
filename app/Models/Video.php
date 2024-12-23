<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Video extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'videos';

    protected $appends = [
        'video',
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'url',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getVideoAttribute()
    {
        return $this->getMedia('video')->last();
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview = $file->getUrl('preview');
        }

        return $file;
    }

    public function getCustomDateAttribute()
    {
        $date = $this->created_at;

        if ($date != null) {

            $translatedDate = Carbon::parse($date)->locale('ar')->translatedFormat('d F Y');

        } else {
            return $date;
        }

        return $translatedDate;
    }

    public function getUrlAttribute()
    {
        if (preg_match('/(?:v=|youtu\.be\/|embed\/)([a-zA-Z0-9_-]+)/',  $this->attributes['url'], $matches)) {
            $youtubeId = $matches[1];
            return "https://www.youtube.com/embed/" . $youtubeId;
        }
        return null;
    }

}
