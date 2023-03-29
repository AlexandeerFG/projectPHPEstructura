<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $table = "table_autos";

    protected $primaryKey = "id_auto";

    protected $fillable = ["modelo", "color", "marca", "telefono", "created_at", "updated_at"];

    use HasFactory;
}
