<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionRating extends Model
{
    protected $fillable = ['section_key', 'rating', 'user_id', 'ip_address', 'user_agent'];
}
