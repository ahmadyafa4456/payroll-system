<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class totalGaji extends Model
{
    use HasFactory;
    protected $table = "total_gaji";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    protected $guarded = ["id"];
    public $timestamps = false;
}
