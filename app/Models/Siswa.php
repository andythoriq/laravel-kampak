<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Traits\GeneralMessage;
use App\Traits\GetAllColumn;

class Siswa extends Model
{
    use HasFactory;
    use GeneralMessage;
    use GetAllColumn;
    protected $table = 'tb_siswa';
    protected $fillable = ['nis', 'nama', 'jk', 'alamat', 'password'];
    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
