<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAkademikModel extends Model
{
    protected $table = 'tahunakademik';
    protected $primaryKey = 'id_tahunakademik';
    public $timestamps = false;
    protected $guarded = ['id_tahunakademik'];
}
