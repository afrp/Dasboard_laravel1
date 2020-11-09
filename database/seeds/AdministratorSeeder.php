<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        
        $administrator->name = "Site Administrator";
        $administrator->email = "administrator@larashop.test";
        $administrator->password = \Hash::make("larashop");
        $administrator->username = "administrator";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->address = "Mandirancan, Jawa Barat";
        $administrator->phone = "08675432190";
        $administrator->avatar = "saat-ini-tidak-ada-file.png";
        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
