<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $s1=new Student;
        // //mgmg
        // $s1->name="Mya";
        // $s1->email="mya@gmail.com";
        // $s1->address="Bahan";
        // $s1->save();

        // $s2=new Student;
        // //susu
        // $s2->name="Mya";
        // $s2->email="mya@gmail.com";
        // $s2->address="Hpaan";
        // $s2->save();
        factory(App\Student::class, 10)->create();
    }
}
