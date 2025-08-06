<?php

namespace App\Models\ExamPrep;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_exam extends Model
{
    use HasFactory;

    protected $table = "user_exams";
    protected $primaryKey = "id";

    protected $fillable = [
        'user_id',
        'exam_id',
        'subject_id',
        'std_status',
        'exam_joined'
    ];

    public function subject()
    {
        return $this->belongsTo(Subjects::class, 'subject_id');
    }

    public function exam()
    {
        return $this->belongsTo(Exams::class, 'exam_id');
    }
}
