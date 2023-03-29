<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $table = "table_usuarios";

    protected $primaryKey = "id";

    protected $fillable = ["nombre", "apellidoPaterno", "apellidoMaterno", "telefono", "correo", "created_at", "updated_at"];

    use HasFactory;

}
