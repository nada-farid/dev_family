<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Volunteer extends Authenticatable implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'volunteers';

    protected $guard = 'volunteer';

    protected $appends = [
        'cv',
        'photo',
    ]; 

    protected $hidden = [ 
        'remember_token',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'identity_num',
        'email',
        'password',
        'phone_number',
        'interest',
        'initiative_name',
        'prev_experience',
        'approved',
        'email_verified_at',
        'remember_token',
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
        $this->addMediaConversion('preview2')->fit('crop', 440, 440);
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->preview2   = $file->getUrl('preview2');
        }

        return $file;
    }

    public function getCvAttribute()
    {
        return $this->getMedia('cv')->last();
    }
    public function volunteerVolunteerTasks()
    {
        return $this->hasMany(VolunteerTask::class, 'volunteer_id', 'id');
    }
}
