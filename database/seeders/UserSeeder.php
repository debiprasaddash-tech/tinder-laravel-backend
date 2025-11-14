<?php
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Alice', 'age' => 25, 'pictures' => '[https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4_1z68Lam5-Yhl1WF22npO5En3XCkWK5OnA&s,]', 'location' => 'New York'],
            ['name' => 'Bob', 'age' => 30, 'pictures' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVlUjgB-jYxq1vSvZFSPCjMzYavmiHSeWQDA&s', 'location' => 'London'],
            ['name' => 'Charlie', 'age' => 28, 'pictures' => '[]', 'location' => 'Paris'],
            ['name' => 'Diana', 'age' => 26, 'pictures' => '[]', 'location' => 'Tokyo'],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
