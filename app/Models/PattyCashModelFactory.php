<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\PattyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PattyCashModelFactory extends Model
{
    use HasFactory, SoftDeletes;

    protected static function newFactory(): Factory
    {
        return PattyFactory::new();
    }

    protected $table = 'pattycash';
    public $timestamps = false;
    protected $guarded = ['id_patty'];
    protected $primaryKey = 'id_patty';
}
