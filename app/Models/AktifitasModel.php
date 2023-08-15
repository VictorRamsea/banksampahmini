<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktifitasModel extends Model
{
    use HasFactory;
    protected $table = 'aktifitas';
    public $timestamps = false;
    protected $guarded = ['id_aktifitas'];
    protected $primaryKey = 'id_aktifitas';
}
