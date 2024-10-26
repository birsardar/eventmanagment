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
                'category' => $categories->first(), // Default category for testing
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
                'attendees' => [['name' => 'John Doe', 'email' => 'john@example.com']],
                'user_id' => '1',
            ],
            [
                'title' => 'React Seminar',
                'description' => 'A React seminar event',
                'date' => '2024-12-20',
                'location' => 'Biratnagar',
                'category' => $categories->where('name', 'Seminar')->first(),
                'attendees' => [['name' => 'John Doe', 'email' => 'john@example.com']],
                'user_id' => '1',
            ],
            // ... other events
        ];

        foreach ($events as $eventData) {
            // Skip if category is missing
            if (empty($eventData['category'])) {
                echo "Category for event '{$eventData['title']}' not found. Skipping.\n";
                continue;
            }

            // Create the event
            $event = Event::create([
                'title' => $eventData['title'],
                'description' => $eventData['description'],
                'date' => $eventData['date'],
                'location' => $eventData['location'],
                'category_id' => $eventData['category']->id,
            ]);

            // Create attendees if any
            if (!empty($eventData['attendees'])) {
                $event->attendees()->createMany($eventData['attendees']);
            }
        }
    }
}
