<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * \App\Models\User.
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $uhid
 * @property string $shirt_size
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
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
        'uhid',
        'shirt_size',
        'password',
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

    public function size(): string
    {
        switch ($this->shirt_size) {
            case "XS":
                return "X-Small";
                break;
            case "S":
                return "Small";
                break;
            case "M":
                return "Medium";
                break;
            case "L":
                return "Large";
                break;
            case "XL":
                return "X-Large";
                break;
            case "XXL":
                return "XX-Large";
                break;
        }
        return "";
    }

    /**
     * Get the connected accounts for the user.
     */
    public function connectedAccounts(): HasMany
    {
        return $this->hasMany(ConnectedAccount::class);
    }

    /**
     * Get the subscriptions for the user.
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}
