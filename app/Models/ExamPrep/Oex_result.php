<?php

namespace App\Models\ExamPrep;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oex_result extends Model
{
    use HasFactory;

    protected $table = "oex_results";
    protected $primaryKey = "id";

   protected $fillable = [
    'exam_id',
    'user_id',
    'yes_ans',
    'no_ans',
    'result_json'
];

     public function exam()
    {
        return $this->belongsTo(Subjects::class, 'exam_id', 'id');
    }
}
