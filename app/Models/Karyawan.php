<?php

namespace App\Models;

use App\Models\Faceid;
use App\Models\Absensi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Karyawan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function absensi(): HasMany {
        return $this->hasMany(Absensi::class);
    }

    public function faceid(): HasOne {
        return $this->hasOne(Faceid::class);
    }
}
