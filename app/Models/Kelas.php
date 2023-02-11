<?php

namespace App\Models;

use App\Models\Jurusan;
use App\Traits\GeneralMessage;
use App\Traits\GetAllColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    use GeneralMessage;
    use GetAllColumn;
    protected $table = 'tb_kelas';
    protected $fillable = ['nama', 'jurusan_id'];
    public function jurusan() {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
