<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded = [];

    protected $table = 'Hotels';

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
