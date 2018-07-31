<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;

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
        'name', 'lastname', 'birthdate', 'gender', 'address', 'phone', 'cell_phone', 'work', 'branch_id'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class)->orderBy('created_at', 'DESC');
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->lastname;
    }
    
    public function getAgeAttribute()
    {
        return Carbon::createFromFormat('Y-m-d',$this->birthdate)->age;
    }

    public function scopeSearch($query, $param)
    {
        return $query->where('name', 'LIKE', '%' . $param . '%')->orWhere('lastname', 'LIKE', '%' . $param . '%')->get();
    }

    public function sales()
    {
        return $this->hasManyThrough(Sale::class, Exam::class);
    }
}
