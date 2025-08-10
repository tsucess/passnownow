<?php

namespace App\Models\ExamPrep;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    protected $table = 'exams';
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'title',
        'description',
        'avatar',
        'status'
    ];


    public function subjects()
{
    return $this->hasMany(Subjects::class, 'exam_unique_id');
}

}
