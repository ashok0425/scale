<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailCampaign extends Model
{
    use HasFactory;

    public function subscription(){
       return $this->belongsTo(Subscriber::class,'subscription_id','id');
    }
}
