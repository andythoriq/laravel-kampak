<?php

namespace App\Models;

use App\Traits\GeneralMessage;
use App\Traits\GetAllColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    use GeneralMessage;
    use GetAllColumn;
    protected $table = 'tb_guru';
    protected $fillable = ['nip', 'nama', 'jk', 'alamat', 'password'];
    protected $hidden = ['password'];
}
