<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_RESIDENT = 'resident';

    const ROLES = [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_RESIDENT => 'Resident',
    ];

    public function canAccessPanel(Panel $panel): bool 
    {
        return $this->isAdmin();
    }

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isResident()
    {
        return $this->role === self::ROLE_RESIDENT;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'role',
        'birth_date',
        'birth_place',
        'age',
        'status',
        'blood_type',
        'occupation',
        'religion',
        'gender',
        'nationality',
        'image',
        'purok_id',
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

    public function purok()
    {
        return $this->belongsTo(Purok::class);
    }

    public function official()
    {
        return $this->hasOne(Official::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
