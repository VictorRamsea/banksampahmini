<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\TransaksiFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiModelFactory extends Model
{
    use HasFactory, SoftDeletes;

    protected static function newFactory(): Factory
    {
        return TransaksiFactory::new();
    }

    protected $table = 'transaksi';
    public $timestamps = false;
    protected $guarded = ['id_transaksi'];
    protected $primaryKey = 'id_transaksi';

}
