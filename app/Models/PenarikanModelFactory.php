<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\PenarikanFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenarikanModelFactory extends Model
{
    use HasFactory, SoftDeletes;

    protected static function newFactory(): Factory
    {
        return PenarikanFactory::new();
    }

    protected $table = 'penarikan';
    public $timestamps = false;
    protected $guarded = ['id_penarikan'];
    protected $primaryKey = 'id_penarikan';
}
