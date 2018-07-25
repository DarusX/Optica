<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Exam extends Model
{
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model){
            $model->created_by = Auth::id();
        });
    }

    protected $fillable = [
        'od_axis', 'od_cylinder', 'od_sphere',
        'os_axis', 'os_cylinder', 'os_sphere',
        'ou_axis', 'ou_cylinder', 'ou_sphere',
        'addition', 'alt', 'pupilary_distance',
        'patient_id', 'created_by'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
    
}
