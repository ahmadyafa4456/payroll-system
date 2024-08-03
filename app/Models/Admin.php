<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = "admin";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    protected $guarded = ["id"];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
