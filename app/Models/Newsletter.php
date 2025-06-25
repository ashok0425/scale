<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    // Appending computed attributes to the model's array form
    protected $appends = ['total_email_count', 'deliver_email_count', 'seen_email_count'];

    public function campaigns()
    {
        return $this->belongsToMany(Subscriber::class, 'email_campaigns', 'newsletter_id', 'subscription_id');
    }

    // Accessor for the total_email_count attribute
    public function getTotalEmailCountAttribute()
    {
        return $this->campaigns()->count();
    }

    // Accessor for the deliver_email_count attribute
    public function getDeliverEmailCountAttribute()
    {
        return $this->campaigns()->whereNotNull('deliver_at')->count();
    }

    // Accessor for the seen_email_count attribute
    public function getSeenEmailCountAttribute()
    {
        return $this->campaigns()->whereNotNull('seen_at')->count();
    }
}
