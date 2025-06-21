<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;

  protected  $fillable=[
        'page_url','meta_title','meta_keywords','meta_description','thumbnail'
    ];
}
