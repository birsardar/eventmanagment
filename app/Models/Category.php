<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\User;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
