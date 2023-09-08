<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\SubscriptionType;

/**
 * \App\Models\Subscription.
 * 
 * @property int $id
 * @property int $user_id
 * @property int $subscription_type_id
 * @property string $total
 * @property boolean $paid
 */
class Subscription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'subscription_type_id', 'total', 'paid'
    ];

    /**
     * Get the user the user that has the subscription.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the type of subscription the subscription is.
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(SubscriptionType::class);
    }

    /**
     * Check if the subscription has been paid.
     */
    public function paid(): bool
    {
        return (bool)$this->paid;
    }
}
