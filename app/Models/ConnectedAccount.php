<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * \App\Models\ConnectedAccount.
 * 
 * @property int $id
 * @property int $user_id
 * @property string $provider_user_id
 * @property string $provider
 * @property string $provider_key
 */
class ConnectedAccount extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'provider_user_id', 'provider'
    ];

    /**
     * Get the user the user that owns the connected account.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}