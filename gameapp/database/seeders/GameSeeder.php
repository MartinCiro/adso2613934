<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $game = new Game;
        $game->title = 'Mario Oddyssey';
        $game->developer = 'Nintendo';
        $game->releasedate = '2017-10-27';
        $game->category_id = 1;
        $game->user_id = 1;
        $game->price = 59;
        $game->genre = '3D Adventura';
        $game->description = 'Lorem ipsum dolor sit amet';
        $game->save();

        $game = new Game;
        $game->title = 'Halo Infinity';
        $game->developer = '343 Industry';
        $game->releasedate = '2021-12-08';
        $game->category_id = 2;
        $game->user_id = 1;
        $game->price = 60;
        $game->genre = 'FPS';
        $game->description = 'Lorem ipsum dolor sit amet';
        $game->save();

        $game = new Game;
        $game->title = 'Cyberpunk 2077';
        $game->developer = 'CD Project Red';
        $game->releasedate = '2020-12-08';
        $game->category_id = 3;
        $game->user_id = 1;
        $game->price = 60;
        $game->genre = 'RPG Action';
        $game->description = 'Lorem ipsum dolor sit amet';
        $game->save();

        $game = new Game;
        $game->title = 'God of war Ragnarok';
        $game->developer = 'Santa Monica';
        $game->releasedate = '2022-11-09';
        $game->category_id = 4;
        $game->user_id = 1;
        $game->price = 70;
        $game->genre = 'Action Aventure';
        $game->description = 'Lorem ipsum dolor sit amet';
        $game->save();
    }
}