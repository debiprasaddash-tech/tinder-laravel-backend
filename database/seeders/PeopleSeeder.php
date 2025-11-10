<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Person;

class PeopleSeeder extends Seeder
{
    public function run(): void
    {
        Person::truncate();

        $data = [
            ['name' => 'Alice', 'age' => 25, 'location' => 'Delhi', 'pictures' => json_encode(['https://picsum.photos/300/400?1'])],
            ['name' => 'Bob', 'age' => 27, 'location' => 'Mumbai', 'pictures' => json_encode(['https://picsum.photos/300/400?2'])],
            ['name' => 'Cathy', 'age' => 24, 'location' => 'Pune', 'pictures' => json_encode(['https://picsum.photos/300/400?3'])],
            ['name' => 'David', 'age' => 30, 'location' => 'Bangalore', 'pictures' => json_encode(['https://picsum.photos/300/400?4'])],
        ];

        foreach ($data as $person) {
            Person::create($person);
        }
    }
}
