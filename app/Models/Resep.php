<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    // /**
    //  * Get the rmedik that owns the Resep
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function rmedik(): BelongsTo
    // {
    //     return $this->belongsTo(RekamMedik::class, 'resep_id', 'id_rekam_medik');
    // }

    /**
     * Get the rmedik associated with the Resep
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rmedik(): HasOne
    {
        return $this->hasOne(RekamMedik::class, 'resep_id', 'id_resep');
    }
}
