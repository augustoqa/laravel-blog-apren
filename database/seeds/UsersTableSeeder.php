<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer']);

        $viewPostsPermission = Permission::create(['name' => 'View posts']);
        $createPostsPermission = Permission::create(['name' => 'Create posts']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts']);

        $admin = new User;
        $admin->name = 'Cesar';
        $admin->email = 'cesar@mail.com';
        $admin->password = bcrypt('123123');
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'Luis';
        $writer->email = 'luis@mail.com';
        $writer->password = bcrypt('123123');
        $writer->save();

        $writer->assignRole($writerRole);
    }
}
