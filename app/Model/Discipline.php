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
        'hours'
    ];

    public function control_type()
    {
        return $this->belongsTo(Control_type::class, 'control_type_id');
    }
}