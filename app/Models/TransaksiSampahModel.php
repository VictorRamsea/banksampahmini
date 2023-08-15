<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiSampahModel extends Model
{
    use HasFactory;
    protected $table = 'transaksi_sampah';
    public $timestamps = false;
    protected $guarded = ['id_transaksi_sampah'];
    protected $primaryKey = 'id_transaksi_sampah';
}
