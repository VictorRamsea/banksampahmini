<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\TabunganFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TabunganModelFactory extends Model
{
    use HasFactory, SoftDeletes;

    protected static function newFactory(): Factory
    {
        return TabunganFactory::new();
    }

    protected $table = 'tabungan';
    public $timestamps = false;
    protected $guarded = ['id_tabungan'];
    protected $primaryKey = 'id_tabungan';

}
