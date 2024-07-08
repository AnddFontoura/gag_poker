<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $usersOnFile = Storage::disk('public')->get('particioantes.txt');
        $users = explode("\n", $usersOnFile);

        foreach ($users as $user) {
            User::create([
                'name' => $user,
                'email' => Str::slug($user) . '@example.com',
                'password' => Hash::make($user . date('u')),
                'is_admin' => false,
            ]);
        }
    }
}
