<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSampahModel extends Model
{
    use HasFactory;
    protected $table = 'banksampah';
    public $timestamps = false;
    protected $guarded = ['id_banksampah'];
    protected $primaryKey = 'id_banksampah';

    public static function findById($id_banksampah)
    {
        return self::find($id_banksampah);
    }
}
