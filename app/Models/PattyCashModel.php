<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PattyCashModel extends Model
{
    use HasFactory;
    protected $table = 'pattycash';
    public $timestamps = false;
    protected $guarded = ['id_patty'];
    protected $primaryKey = 'id_patty';
}
