<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'tb_jurusan';
    protected $fillable = ['nama'];
    public static function getAllSubjectId() {
        $subjects_id = Jurusan::select('id')->get();
        $subjects_string = '';
        foreach ($subjects_id as $subject) {
            $subjects_string .= $subject->id . ',';
        }
        return rtrim($subjects_string, ',');
    }
}