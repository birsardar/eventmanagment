<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\User;

class Attendee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'event_id'];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_attendee');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
