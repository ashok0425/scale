<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailGroup extends Model
{
    use HasFactory;

    protected $fillable=[
        'name'
    ];

    protected $casts=[
        'email_ids'=>'array'
    ];
}
