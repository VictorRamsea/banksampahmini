<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    public $timestamps = false;
    protected $guarded = ['id_transaksi'];
    protected $primaryKey = 'id_transaksi';

    // protected $fillable = [
    //     'tanggal_transaksi',
    //     'fullname_transaksi',
    //     'tabungan_transaksi',
    // ];
}
