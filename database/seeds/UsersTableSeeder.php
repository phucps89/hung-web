<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/30/2017
 * Time: 11:10 PM
 */

use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\Repositories\UserRepository $repository)
    {
        //
        $repository->create([
            'email' => 'phuc.ps.89@gmail.com',
            'password' => '123456',
            'name' => 'Hung',
        ]);
    }
}