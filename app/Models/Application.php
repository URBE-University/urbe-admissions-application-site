<?php

namespace App\Models;

use Laravel\Cashier\Billable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use function Illuminate\Events\queueable;

class Application extends Model
{
    use HasFactory;
    use Billable;

    protected $guarded = [];

    protected $casts = [
        'completed_at' => 'datetime'
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::updated(queueable(function ($customer) {
            if ($customer->hasStripeId()) {
                $customer->syncStripeCustomerDetails();
            }
        }));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
