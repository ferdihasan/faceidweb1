<?php

namespace App\Models;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faceid extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function karyawan () : BelongsTo {
        return $this->belongsTo(Karyawan::class);
    }
}
