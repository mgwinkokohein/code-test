<?php

namespace Modules\Movie\Database\Seeders;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Auth\Models\User;

// use Spatie\Permission\Models\Role;
use Modules\Movie\Entities\Movie;
use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;

class MovieDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        //test 
        // Grouped permissions
        // Users category
        $lower_module = strtolower('Movie');
        $name = 'admin.access.'.$lower_module;

        $users = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => $name,
            'description' => 'All '.$lower_module.' Permissions',
        ]);

        $users->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.'.$lower_module.'.manage',
                'description' => 'manage '.$lower_module,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.'.$lower_module.'.view',
                'description' => 'view '.$lower_module,
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.'.$lower_module.'.create',
                'description' => 'create '.$lower_module,
                'sort' => 3,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.'.$lower_module.'.edit',
                'description' => 'edit '.$lower_module,
                'sort' => 4,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.'.$lower_module.'.delete',
                'description' => 'delete '.$lower_module,
                'sort' => 5,
            ]),
        ]);
        //end test

        $movies = [
            ['id' => 1, 'title'=>'The Avengers', 'director'=>'Joss Whedon', 'user_id'=>3, 'rating'=>2,'created_at'=>now(), 'updated_at'=>now()],
            ['id' => 2, 'title'=>'Inception', 'director'=>'Christopher Nolan', 'user_id'=>4, 'rating'=>2,'created_at'=>now(), 'updated_at'=>now()],
            ['id' => 3, 'title'=>'Titanic', 'director'=>'James Cameron', 'user_id'=>4, 'rating'=>2,'created_at'=>now(), 'updated_at'=>now()],
            ['id' => 4, 'title'=>'Jurassic Park', 'director'=>'Steven Spielberg', 'rating'=>2,'user_id'=>3, 'created_at'=>now(), 'updated_at'=>now()],
            ['id' => 5, 'title'=>'The Shawshank Redemption', 'director'=>'Frank Darabone', 'rating'=>2,'user_id'=>3, 'created_at'=>now(), 'updated_at'=>now()],
            ['id' => 6, 'title' => 'The Matrix', 'director' => 'Lana Wachowski', 'rating' => 3, 'user_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'title' => 'Forrest Gump', 'director' => 'Robert Zemeckis', 'rating' => 4, 'user_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'title' => 'Avatar', 'director' => 'James Cameron', 'rating' => 4, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'title' => 'Pulp Fiction', 'director' => 'Quentin Tarantino', 'rating' => 4, 'user_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'title' => 'The Lion King', 'director' => 'Roger Allers', 'rating' => 3, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'title' => 'The Dark Knight', 'director' => 'Christopher Nolan', 'rating' => 5, 'user_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'title' => 'Forrest Gump', 'director' => 'Robert Zemeckis', 'rating' => 4, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'title' => 'Interstellar', 'director' => 'Christopher Nolan', 'rating' => 5, 'user_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'title' => 'The Godfather', 'director' => 'Francis Ford Coppola', 'rating' => 5, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'title' => 'Avengers: Infinity War', 'director' => 'Anthony Russo', 'rating' => 4, 'user_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ];

        Movie::insert($movies);
    }
}
