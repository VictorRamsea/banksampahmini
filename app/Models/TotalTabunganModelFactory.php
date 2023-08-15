<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\TotalTabunganFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TotalTabunganModelFactory extends Model
{
    use HasFactory, SoftDeletes;

    protected static function newFactory(): Factory
    {
        return TotalTabunganFactory::new();
    }

    protected $table = 'total_tabungan';
    public $timestamps = false;
    protected $guarded = ['id_totab'];
    protected $primaryKey = 'id_totab';
}
