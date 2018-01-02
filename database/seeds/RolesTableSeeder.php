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
            'guard_name'  =>  AUTH_GUARD_USER,
            'description' => 'Administrator',
        ]);
        $user->assignRole($admin);

        $this->permissions();
    }

    private function permissions()
    {
        $permissionManageUser = new \App\Entities\Permission();
        $permissionManageUser->name         = \App\Entities\Permission::MANAGE_USER;
        $permissionManageUser->description = 'Manage User'; // optional
        $permissionManageUser->guard_name  =  AUTH_GUARD_USER;
        $permissionManageUser->save();
    }
}