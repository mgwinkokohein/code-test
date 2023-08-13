<?php

namespace Modules\Tag\Database\Seeders;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Auth\Models\User;

// use Spatie\Permission\Models\Role;
use Modules\Tag\Entities\Tag;
use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;

class TagDatabaseSeeder extends Seeder
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
        $lower_module = strtolower('Tag');
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
        $tags = [
            ['id' => 1, 'name'=>'Action', 'created_at'=>now(), 'updated_at'=>now()],
            ['id' => 2, 'name'=>'Comedy', 'created_at'=>now(), 'updated_at'=>now()],
            ['id' => 3, 'name'=>'Drama', 'created_at'=>now(), 'updated_at'=>now()],
            ['id' => 4, 'name'=>'Horror', 'created_at'=>now(), 'updated_at'=>now()],
            ['id' => 5, 'name'=>'Korea', 'created_at'=>now(), 'updated_at'=>now()],
            ['id' => 6, 'name'=>'Adventure', 'created_at'=>now(), 'updated_at'=>now()],
            ['id' => 7, 'name'=>'Animation', 'created_at'=>now(), 'updated_at'=>now()],
        ];

        Tag::insert($tags);
    }
}
