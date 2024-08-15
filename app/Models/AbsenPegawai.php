<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AbsenPegawai extends Model
{
    use HasFactory;
    protected $table = "absen_pegawai";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    protected $guarded = ["id"];
    public $timestamps = false;

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }
}
