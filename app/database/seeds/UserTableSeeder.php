<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2015/5/8
 * Time: 15:28
 */

class UserTableSeeder extends Seeder{

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'username'  => 'it长青',
            'name'      => '钟长青',
            'password'  => Hash::make('admin123'),
            'sex'       => '男',
            'phone'     => '13539701763',
            'identity'  => '1'
        ));

//a login is required for a user ,none given
      /*  Sentry::getUserProvider()->create(array(
            'username'  => 'it长青',
            'name'      => '钟长青',
            'password'  => 'admin123',
            'sex'       => '男',
            'phone'     => '13539701763',
            'identity'  => '1'
        ));*/
        $this->command->info('users数据已填充。');
    }
}