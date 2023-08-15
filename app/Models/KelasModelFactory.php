<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\KelasFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KelasModelFactory extends Model
{
    use HasFactory, SoftDeletes;

    protected static function newFactory(): Factory
    {
        return KelasFactory::new();
    }

    protected $table = 'kelas';
    public $timestamps = false;
    protected $guarded = ['id_kelas'];
    protected $primaryKey = 'id_kelas';

    public function getKelas($id_kelas = false)
    {
        if ($id_kelas == false) {
            return $this->findAll();
        }

        return $this->where(['id_kelas' => $id_kelas])->first();
    }
}
