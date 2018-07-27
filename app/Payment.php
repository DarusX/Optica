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
        });
    }

    protected $fillable = [
        'payment', 'created_by', 'sale_id'
    ];
}
