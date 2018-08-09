<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Base extends Model
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
        'base', 'addition', 'quantity'
    ];
}
