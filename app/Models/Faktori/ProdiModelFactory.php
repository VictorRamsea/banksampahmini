<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\ProdiFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdiModelFactory extends Model
{
    use HasFactory, SoftDeletes;

    protected static function newFactory(): Factory
    {
        return ProdiFactory::new();
    }

    protected $table = 'prodi';
    public $timestamps = false;
    protected $guarded = ['id_prodi'];
    protected $primaryKey = 'id_prodi';
}
