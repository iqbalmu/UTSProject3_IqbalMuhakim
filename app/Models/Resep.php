<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Resep extends Model
{
    use HasFactory;

    protected $primaryKey = "id_resep";

    /**
     * Get all of the details for the Resep
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details(): HasMany
    {
        return $this->hasMany(ResepDetail::class, 'resep_id', 'id_resep');
    }
}
