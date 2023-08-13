<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => 'secret',
            'email_verified_at' => now(),
            'mobile' => '09898989899',
            'active' => true,
        ]);

        for ($i=1 ; $i <=10 ; $i++){
            if (app()->environment(['local', 'testing'])) {
                User::create([
                    'type' => User::TYPE_USER,
                    'name' => 'Test User'.$i,
                    'email' => 'user'.$i.'@user.com',
                    'password' => 'secret'.$i,
                    'email_verified_at' => now(),
                    'mobile' => null,
                    'active' => true,
                ]);
            }
        }

        $this->enableForeignKeys();
    }
}
