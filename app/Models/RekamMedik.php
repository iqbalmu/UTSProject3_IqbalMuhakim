<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RekamMedik extends Model
{
    use HasFactory;

    protected $primaryKey = "id_rekam_medik";

    public function pemeriksaan(): BelongsTo
    {
        return $this->belongsTo(Pemeriksaan::class, 'pemeriksaan_id', 'id_pemeriksaan');
    }

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class, 'dokter_id', 'id_dokter');
    }

    public function resep(): BelongsTo
    {
        return $this->belongsTo(Resep::class, 'resep_id', 'id_resep');
    }
}
