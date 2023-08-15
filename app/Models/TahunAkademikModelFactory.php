<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\TahunAkademikFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahunAkademikModelFactory extends Model
{
    use HasFactory, SoftDeletes;

    protected static function newFactory(): Factory
    {
        return TahunAkademikFactory::new();
    }

    protected $table = 'tahunakademik';
    protected $primaryKey = 'id_tahunakademik';
    public $timestamps = false;
    protected $guarded = ['id_tahunakademik'];
}
