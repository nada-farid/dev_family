<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ReportMoney extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'report_moneys';

    protected $appends = [
        'file',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'part',
        'year',
        'link',
        'published',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PART_SELECT = [
        '1' => 'الربع الأول',
        '2' => 'الربع الثاني',
        '3' => 'الربع الثالت',
        '4' => 'الربع الرابع',
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

    public function getFileAttribute()
    {
        return $this->getMedia('file')->last();
    }
}
