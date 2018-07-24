<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Patient extends Model
{
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model){
            $model->branch_id = Auth::user()->branch_id;
        });
    }

    public function newQuery($excludeDelete = true)
    {
        return parent::newQuery()->where('branch_id', Auth::user()->branch_id);
    }

    protected $fillable = [
        'name', 'lastname', 'address', 'phone', 'branch_id'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->lastname;
    }
}
