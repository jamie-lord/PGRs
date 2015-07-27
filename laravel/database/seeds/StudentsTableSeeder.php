<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User', 'Student', 100)->create()->each(function($u) {
            $u->student()->save(factory('App\Student')->make());
        });

        //calculate end dates for each students
        for ($x = 1; $x <= 100; $x++) {
            $student = App\Student::find($x);
            $student->calculateEnd()->save();
        }

        DB::table('users')->where('id', 21)->update([
            'title' => NULL,
            'first_name' => 'TEST',
            'middle_name' => NULL,
            'last_name' => 'STUDENT',
            'personal_email' => NULL,
            'personal_phone' => NULL,
            'email' => 'student@test.com']);
    }
}
