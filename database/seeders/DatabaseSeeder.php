<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Materi;
use App\Models\ItemMateri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory()->create([
            'name' => 'naomi',
            'user_type' => 'Administrator',
            'email' => 'naomi@gmail.com',
            'password' => Hash::make('123456')
        ]);
        \App\Models\Materi::factory()->create([
            'materi' => 'SAINTEK'
        ]);
        \App\Models\Materi::factory()->create([
            'materi' => 'SOSHUM'
        ]);
        \App\Models\Materi::factory()->create([
            'materi' => 'TPS'
        ]);

        Event::factory()->create([
            'title' => 'UTBK Dimundur',
            'user_id' => '1',
            'slug' => 'utbk-diundur',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
        ]);
        Event::factory()->create([
            'title' => 'Pengumuman SBMPTN',
            'user_id' => '1',
            'slug' => 'pengumuman-utbk',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. .'
        ]);

        ItemMateri::factory()->create([
            'title' => 'Persamaan Dua Linear',
            'materi_id' => '1',
            'slug' => 'persamaan-dua-linear',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
        ]);
        ItemMateri::factory()->create([
            'title' => 'Sejarah Dunia',
            'materi_id' => '2',
            'slug' => 'sejarah-dunia',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
        ]);
        ItemMateri::factory()->create([
            'title' => 'Pola beraturan',
            'materi_id' => '3',
            'slug' => 'pola-beraturan',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
        ]);

    }
}
