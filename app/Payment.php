<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Payment extends Model
{
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model){
            $model->created_by = Auth::id();
            $model->branch_id = Auth::user()->branch_id;
        });
    }

    public function newQuery($excludeDelete = true)
    {
        return parent::newQuery()->where('branch_id', Auth::user()->branch_id);
    }

    protected $fillable = [
        'payment', 'created_by', 'sale_id', 'branch_id'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
