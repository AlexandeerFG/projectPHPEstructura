<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Auto;

class UsuarioAuto extends Model
{
    protected $table = "table_usuario_autos";

    protected $primaryKey = "id_usuario_auto";

    protected $fillable = ["id_auto", "id_usuario", "created_at", "updated_at"];

    use HasFactory;

    public function Table_Usuarios(){  //-- relaciones
        return $this->hasOne(Usuario::class, 'id_usuario', 'id');
    }

    public function Table_Autos(){ //-- relaciones
        return $this->hasOne(Auto::class, 'id_auto', 'id_auto');
    }
}
