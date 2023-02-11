<?php

namespace App\Models;

use App\Traits\GeneralMessage;
use App\Traits\GetAllColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    use GeneralMessage;
    use GetAllColumn;
    protected $table = 'tb_nilai';
    protected $fillable = ['uh', 'uts', 'uas', 'na'];
    public function mengajar() {
        return $this->belongsTo(Mengajar::class, 'mengajar_id');
    }
    public function siswa() {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
