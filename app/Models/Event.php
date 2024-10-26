<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attendee;
use App\Models\Category;
use App\Models\User;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'date', 'location', 'category_id'];
    protected $cast = ['date' => 'datetime'];

    public function attendees()
    {
        return $this->belongsToMany(Attendee::class, 'event_attendee');
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
