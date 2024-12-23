<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'projects';

    protected $appends = [
        'image',
        'inner_image',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'start_date',
        'end_date',
        'address',
        'beneficiar_id',
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

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getInnerImageAttribute()
    {
        $file = $this->getMedia('inner_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function beneficiar()
    {
        return $this->belongsTo(Beneficiary::class, 'beneficiar_id');
    }

    public function getEndCustomDateAttribute()
    {
        $date = $this->end_date;

        if ($date != null) {

            $translatedDate = Carbon::createFromFormat('d/m/Y', $date)->locale('ar')->translatedFormat('d F Y');

        }
        else{
            return $date;
        }

        return $translatedDate;
    }
    public function getStartCustomDateAttribute()
    {
        $date = $this->start_date;

        if ($date != null) {

            $translatedDate = Carbon::createFromFormat('d/m/Y', $date)->locale('ar')->translatedFormat('d F Y');

        }
        else{
            return $date;
        }

        return $translatedDate;
    }

}
