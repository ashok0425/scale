<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    // In your Eloquent model (e.g., Booking.php)
public function scopeAccessibleBy($query, $user)
{
    if ($user->can('do:anything')) {
        return $query;
    }

    if ($user->role == 2) {
        return $query;
    }

    return $query->where('user_id', $user->id);
}


    protected $fillable = [
        'thumbnail',
        'title',
        'short_description',
        'long_description',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($blog) {
            $blog->deleted_by = Auth::user()->id;
            $blog->save();
        });
    }


}
