<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'surname',
        'patronym',
        'gender_id',
        'birth_date',
        'address',
        'group_id',
    ];

    // Добавьте эти методы для отношений
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}