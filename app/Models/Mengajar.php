<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Traits\GeneralMessage;
use App\Traits\GetAllColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    use HasFactory;
    use GeneralMessage;
    use GetAllColumn;
    protected $table = 'tb_mangajar';
    public function guru() {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
    public function mapel() {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
