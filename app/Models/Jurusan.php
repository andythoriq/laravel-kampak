<?php

namespace App\Models;

use App\Traits\GeneralMessage;
use App\Traits\GetAllColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    use GeneralMessage;
    use GetAllColumn;
    protected $table = 'tb_jurusan';
    protected $fillable = ['nama'];
}
