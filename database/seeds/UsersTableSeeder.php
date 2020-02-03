<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::collection('users')->delete();
        DB::collection('users')->insert(
            [
            'name' => 'Nguyễn Thư',
            'code' => 'A12345',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('123456'),
            'level' => \App\User::ADMIN,
            'project_ids' => [],
            'tasks_ids' => [],
            'salary' => 100000,
            'template_ids' => [],
            'issue_ids' => [],
            'seed' => true
            ]
        );
        DB::collection('users')->insert(
            [
                'name' => 'Nguyễn Văn An',
                'code' => 'A123454',
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('123456'),
                'level' => \App\User::USER,
                'project_ids' => [],
                'tasks_ids' => [],
                'salary' => 50000,
                'template_ids' => [],
                'issue_ids' => [],
                'seed' => true
            ]
        );
        DB::collection('users')->insert(
            [
                'name' => 'Nguyễn Văn Bình',
                'code' => 'A123451',
                'email' => 'admin3@gmail.com',
                'password' => Hash::make('123456'),
                'level' => \App\User::USER,
                'project_ids' => [],
                'tasks_ids' => [],
                'salary' => 50000,
                'template_ids' => [],
                'issue_ids' => [],
                'seed' => true
            ]
        );
        DB::collection('users')->insert(
            [
                'name' => 'Nguyễn Thị Thư',
                'code' => 'A123451',
                'email' => 'admin4@gmail.com',
                'password' => Hash::make('123456'),
                'level' => \App\User::USER,
                'project_ids' => [],
                'tasks_ids' => [],
                'salary' => 50000,
                'template_ids' => [],
                'issue_ids' => [],
                'seed' => true
            ]
        );
        DB::collection('users')->insert(
            [
                'name' => 'Nguyễn Thị Thùy Linh',
                'code' => 'A123451',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123456'),
                'level' => \App\User::USER,
                'project_ids' => [],
                'tasks_ids' => [],
                'salary' => 50000,
                'template_ids' => [],
                'issue_ids' => [],
                'seed' => true
            ]
        );

        DB::collection('users')->insert(
            [
                'name' => 'Khổng Thị Trang',
                'code' => 'A123451',
                'email' => 'admin7@gmail.com',
                'password' => Hash::make('123456'),
                'level' => \App\User::USER,
                'project_ids' => [],
                'tasks_ids' => [],
                'salary' => 50000,
                'template_ids' => [],
                'issue_ids' => [],
                'seed' => true
            ]
        );

        DB::collection('users')->insert(
            [
                'name' => 'Phạm Thị Thảo',
                'code' => 'A123451',
                'email' => 'admin8@gmail.com',
                'password' => Hash::make('123456'),
                'level' => \App\User::USER,
                'project_ids' => [],
                'tasks_ids' => [],
                'salary' => 50000,
                'template_ids' => [],
                'issue_ids' => [],
                'seed' => true
            ]
        );

        DB::collection('users')->insert(
            [
                'name' => 'Nguyễn Thị Hương',
                'code' => 'A123451',
                'email' => 'admin9@gmail.com',
                'password' => Hash::make('123456'),
                'level' => \App\User::USER,
                'project_ids' => [],
                'tasks_ids' => [],
                'salary' => 50000,
                'template_ids' => [],
                'issue_ids' => [],
                'seed' => true
            ]
        );

        DB::collection('users')->insert(
            [
                'name' => 'Nguyễn Văn Trọng',
                'code' => 'A123651',
                'email' => 'admin10@gmail.com',
                'password' => Hash::make('123456'),
                'level' => \App\User::USER,
                'project_ids' => [],
                'tasks_ids' => [],
                'salary' => 50000,
                'template_ids' => [],
                'issue_ids' => [],
                'seed' => true
            ]
        );
    }
}
