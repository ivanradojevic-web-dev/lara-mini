<?php

use Illuminate\Database\Seeder;

class DepartmentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department1 = \App\Department::find(1);
		$department1->users()->attach([1, 3, 5, 7, 9, 11]);

        $department2 = \App\Department::find(2);
        $department2->users()->attach([2, 4, 6, 8, 10, 12]);

        $department3 = \App\Department::find(3);
        $department3->users()->attach([1, 2, 3]);

        $department4 = \App\Department::find(4);
        $department4->users()->attach([7, 8, 9]);
    }
}
