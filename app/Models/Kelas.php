<?php

namespace App\Models;

use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'tb_kelas';
    protected $fillable = ['nama'];
    public function jurusan() {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
