<?php

namespace App\Models;

use App\Models\Absensi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Karyawan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function absensi(): HasMany {
        return $this->hasMany(Absensi::class);
    }
}
