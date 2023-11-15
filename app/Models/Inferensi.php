<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inferensi extends Model
{
    protected $table = 'inferensi';
    protected $fillable = [
            'id_dataset',
            'pendapatan_rendah', 'pendapatan_sedang', 'pendapatan_tinggi',
            'tanggungan_rendah', 'tanggungan_sedang', 'tanggungan_tinggi',
            'prestasi_rendah', 'prestasi_sedang', 'prestasi_tinggi',
            'raport_rendah', 'raport_sedang', 'raport_tinggi',
            'essay_rendah', 'essay_sedang', 'essay_tinggi',
    ];
}
