<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\AktifitasFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AktifitasModelFactory extends Model
{
    use HasFactory, SoftDeletes;

    protected static function newFactory(): Factory
    {
        return AktifitasFactory::new();
    }

    protected $table = 'aktifitas';
    public $timestamps = false;
    protected $guarded = ['id_aktifitas'];
    protected $primaryKey = 'id_aktifitas';
}
