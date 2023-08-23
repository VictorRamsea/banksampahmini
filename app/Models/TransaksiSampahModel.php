<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiSampahModel extends Model
{
    use HasFactory;
    protected $table = 'transaksi_sampahff';
    public $timestamps = false;
    protected $guarded = ['id_transaksi_sampahff'];
    protected $primaryKey = 'id_transaksi_sampahff';
}
