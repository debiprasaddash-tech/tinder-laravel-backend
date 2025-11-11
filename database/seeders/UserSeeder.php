<?php
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Alice', 'age' => 25, 'pictures' => '[]', 'location' => 'New York'],
            ['name' => 'Bob', 'age' => 30, 'pictures' => '[]', 'location' => 'London'],
            ['name' => 'Charlie', 'age' => 28, 'pictures' => '[]', 'location' => 'Paris'],
            ['name' => 'Diana', 'age' => 26, 'pictures' => '[]', 'location' => 'Tokyo'],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
