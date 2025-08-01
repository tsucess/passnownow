<?php

namespace App\Models\ExamPrep;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = 'subjects';
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'user_unique_id',
        'title',
        'description',
        'exam_duration',
        'exam_unique_id',
        'avatar'
    ];

    public function results()
    {
        return $this->hasMany(Oex_result::class, 'exam_id', 'id');
    }
}
