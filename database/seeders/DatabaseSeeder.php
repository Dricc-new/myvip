<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\TypeAttachment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role1 = new Role();
        $role1->name = 'Admin';
        $role1->save();

        $role2 = new Role();
        $role2->name = 'User';
        $role2->save();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@mygallery.com';
        $admin->password = bcrypt('root');
        $admin->subscribed = true;
        $admin->role_id = 1;
        $admin->save();

        $type1 = new TypeAttachment();
        $type1->name = 'image';
        $type1->save();

        $type2 = new TypeAttachment();
        $type2->name = 'sound';
        $type2->save();

        $type3 = new TypeAttachment();
        $type3->name = 'video';
        $type3->save();

    }
}
