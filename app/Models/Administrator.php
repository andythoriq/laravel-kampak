<?php

namespace App\Models;

use App\Traits\GeneralMessage;
use App\Traits\GetAllColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    use HasFactory;
    use GeneralMessage;
    use GetAllColumn;
    protected $table = "tb_administrator";
    protected $fillable = ['id_admin', 'password'];
}