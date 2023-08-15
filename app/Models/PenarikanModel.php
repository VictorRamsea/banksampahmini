<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenarikanModel extends Model
{
    use HasFactory;
    protected $table = 'penarikan';
    public $timestamps = false;
    protected $guarded = ['id_penarikan'];
    protected $primaryKey = 'id_penarikan';
}
