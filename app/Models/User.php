<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = "id_user";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'username',
        'nomor_hp',
        'role_id',
        'status_aktif'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function pasien(): HasOne
    {
        return $this->hasOne(Pasien::class, 'user_id', 'id_user');
    }

    public function dokter(): HasOne
    {
        return $this->hasOne(Dokter::class, 'user_id', 'id_user');
    }

    public function role(): HasOne
    {
        return $this->hasOne(Role::class, 'role_id', 'id_role');
    }

    public function hasRole($roles)
    {
        $currentRole = Role::find($this->role_id);
        return in_array($currentRole->roles, $roles);
    }
}
