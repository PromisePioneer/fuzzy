<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dataset extends Model
{
    protected $table = 'dataset';
    protected  $fillable = [
        'user_id',
        'pendapatan_ortu',
        'tanggungan_ortu',
        'jumlah_prestasi',
        'nilai_raport',
        'nilai_essay',
    ];

    protected $with = ['user'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id', 'id');
    }
}
