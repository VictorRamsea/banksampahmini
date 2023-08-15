<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdiModel extends Model
{
    use HasFactory;
    protected $table = 'prodi';
    public $timestamps = false;
    protected $guarded = ['id_prodi'];
    protected $primaryKey = 'id_prodi';
}
