<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Empleados extends Model
{
    use HasFactory;

     /**
     * Get the company that owns the Presale
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function puesto(): BelongsTo
    {
        return $this->belongsTo(Puestos::class, 'puesto_id', 'id');
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id','id');
    }

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresas::class, 'empresa_id','id');
    }

}
