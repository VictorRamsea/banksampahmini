<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabunganModel extends Model
{
    use HasFactory;
    protected $table = 'tabungan';
    public $timestamps = false;
    protected $guarded = ['id_tabungan'];
    protected $primaryKey = 'id_tabungan';

}
