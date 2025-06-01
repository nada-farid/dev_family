<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class VolunteerTask extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;
    public $table = 'volunteer_tasks';

    protected $appends = [
        'files',
    ];
    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const VISIT_TYPE_SELECT = [
        'قسم الاسكان'  => 'قسم الاسكان',
        'لجنة التسكين' => 'لجنة التسكين',
    ];

    public const STATUS_SELECT = [
        'pending' => 'قيد الانتظار',
        'working' => 'قيد التنفيذ',
        'done'    => 'تم الانتهاء',
        'cancel'  => 'تم الالغاء',
    ];

    protected $fillable = [
        'volunteer_id',
        'name',
        'identity',
        'address',
        'phone',
        'details',
        'visit_type',
        'date',
        'arrive_time',
        'leave_time',
        'status',
        'cancel_reason',
        'notes',
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
    
    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class, 'volunteer_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
    public function getFilesAttribute()
    {
        return $this->getMedia('files');
    }
}
