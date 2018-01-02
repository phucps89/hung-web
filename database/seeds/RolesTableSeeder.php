<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/30/2017
 * Time: 11:21 PM
 */

use Illuminate\Database\Seeder;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(
        \App\Repositories\UserRepository $userRepository,
        \App\Repositories\RoleRepository $roleRepository
    )
    {
        //
        $user = $userRepository->first();
        $admin = $roleRepository->create([
            'name'  =>  \App\Entities\Role::ADMIN,
            'display_name' => 'Administrator',
            'description' => 'Administrator',
        ]);
        $user->attachRole($admin);

        $this->permissions();
    }

    private function permissions()
    {
        $permissionManageUser = new \App\Entities\Permission();
        $permissionManageUser->name         = \App\Entities\Permission::MANAGE_USER;
        $permissionManageUser->display_name = 'Manage User'; // optional
        $permissionManageUser->description  = 'View/Create/Edit/Delete User'; // optional
        $permissionManageUser->save();
    }
}