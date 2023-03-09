<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin',
               'email'=>'admin@gmail.com',
               'level'=>1,
               'password'=> Hash::make('admin123'),
            ],
            [
                'name'=>'Petugas',
                'email'=>'petugas@gmail.com',
                'level'=>2,
                'password'=> Hash::make('petugas123'),
             ],
             [
                'name'=>'Siswa',
                'email'=>'siswa@gmail.com',
                'level'=>3,
                'password'=> Hash::make('siswa123'),
             ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}