<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'username',
        'unique_id'
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
    ];

    /**
     * Determinate is user administrator
     * @return bool
     */
    public function isAdmin() : bool 
    {
        return (bool) ($this->role == 'administrator');
    }

    /**
     * Determinate is user secretary 
     * 
     * @return bool
     */
    public function isSecretary() : bool 
    {
        return (bool) ($this->role == 'secretary');
    }

    /**
     * Delete user
     * 
     * @return bool
     */
    public function remove() : bool 
    {
        return (bool) $this->delete();
    }

    /**
     * Update User 
     * 
     * @param array $userData
     * @return bool
     */
    public function updateUser(array $userData) : bool
    {
        return (bool) $this->update($userData);
    }

    /**
     * All files related to user
     * 
     * @return HasMany
     */
    public function documents() : HasMany
    {
        return $this->hasMany(File::class, 'user_id', 'id');
    }

    /**
     * Important method to determinate
     * is there users in users table
     * 
     * @return bool
     */
    public static function usersTableEmpty() : bool 
    {
        return (bool) ! sizeof( self::all() );
    } 

    /**
     * @return Collection
     */
    public static function administration() : Collection
    {
        return self::where('role', 'administrator')
                    ->orWhere('role', 'secretary')
                    ->get();
    }
}
