<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        $this->seedUserTable();

        Model::reguard();
    }

    public function seedUserTable() {

        $user = new User();
        $user->name= "German";
        $user->password= bcrypt(env("PASSWORD_ESTIMAT", 123456));
        $user->email="germanfake@gmail.com";
        $user->save();

    }
}
