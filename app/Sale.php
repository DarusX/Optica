<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Sale extends Model
{
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model){
            $model->created_by = Auth::id();
        });
    }

    protected $fillable = [
        'frame', 'notes', 'total', 'paid', 'status', 'material_id', 'exam_id', 'created_by'
    ];

    public function getFullStatusAttribute()
    {
        $fullStatus = '';

        ($this->paid) ? $fullStatus = $fullStatus . 'Pagado - ' : $fullStatus = $fullStatus . 'Pagos pendientes - ' ;
        $fullStatus = $fullStatus . $this->status;

        return $fullStatus;
    }
}
