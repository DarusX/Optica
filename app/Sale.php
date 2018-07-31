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
            $model->branch_id = Auth::user()->branch_id;
        });
    }

    protected $fillable = [
        'frame', 'notes', 'total', 'paid', 'status', 'material_id', 'exam_id', 'created_by', 'branch_id'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function getRemainingAttribute()
    {
        return $this->total - $this->payments->sum('payment');
    }

    public function getFullStatusAttribute()
    {
        $fullStatus = '';

        ($this->paid) ? $fullStatus = $fullStatus . 'Pagado - ' : $fullStatus = $fullStatus . 'Pagos pendientes - ' ;
        $fullStatus = $fullStatus . $this->status;

        return $fullStatus;
    }
}
