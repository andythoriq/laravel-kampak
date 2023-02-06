<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'tb_guru';
    protected $fillable = ['nip', 'nama', 'jk', 'alamat', 'password'];
    protected $hidden = ['password'];
}
