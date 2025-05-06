<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'control_type_id',
        'hours'
    ];

    public function control_type()
    {
        return $this->belongsTo(Control_type::class, 'control_type_id');
    }
}