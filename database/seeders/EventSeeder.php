<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        $events = [
            [
                'title' => 'Laravel Conference',
                'description' => 'A Laravel conference event',
                'date' => '2024-12-10',
                'location' => 'Kathmandu',
                'category' => $categories->first(),
                'attendees' => [
                    ['name' => 'John Doe', 'email' => 'john@example.com'],
                    ['name' => 'Jane Doe', 'email' => 'jane@example.com'],
                ],
                'user_id' => '1',
            ],
            [
                'title' => 'Vue.js Workshop',
                'description' => 'A Vue.js workshop event',
                'date' => '2024-12-15',
                'location' => 'Pokhara',
                'category' => $categories->where('name', 'Workshop')->first(),
                'attendees' => [],
                'user_id' => '1',
            ],
            [
                'title' => 'React Seminar',
                'description' => 'A React seminar event',
                'date' => '2024-12-20',
                'location' => 'Biratnagar',
                'category' => $categories->where('name', 'Seminar')->first(),
                'attendees' => [],
                'user_id' => '1',
            ],
            [
                'title' => 'Angular Meetup',
                'description' => 'An Angular meetup event',
                'date' => '2024-12-25',
                'location' => 'Chitwan',
                'category' => $categories->where('name', 'Workshop')->first(),
                'attendees' => [],
                'user_id' => '1',
            ],
            [
                'title' => 'Node.js Hackathon',
                'description' => 'A Node.js hackathon event',
                'date' => '2024-12-30',
                'location' => 'Butwal',
                'category' => $categories->where('name', 'Workshop')->first(),
                'attendees' => [
                    [
                        'name' => 'John Doe',
                        'email' => 'jhone@gmail.com',
                    ],
                ],
            ],

        ];

        foreach ($events as $eventData) {
            $event = Event::create([
                'title' => $eventData['title'],
                'description' => $eventData['description'],
                'date' => $eventData['date'],
                'location' => $eventData['location'],
                'category_id' => $eventData['category']->id,

            ]);

            if (!empty($eventData['attendees'])) {
                $event->attendees()->createMany($eventData['attendees']);
            }
        }
    }
}
