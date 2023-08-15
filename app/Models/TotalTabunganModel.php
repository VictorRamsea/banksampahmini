<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalTabunganModel extends Model
{
    use HasFactory;

    protected $table = 'total_tabungan';
    public $timestamps = false;
    protected $guarded = ['id_totab'];
    protected $primaryKey = 'id_totab';
}
