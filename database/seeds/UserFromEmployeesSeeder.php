<?php
use App\Employee;
use App\User;
use Illuminate\Database\Seeder;

class UserFromEmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::chunk(100,function($employees){
            foreach ($employees as $employee){
                $user = new User();
                $user->email = $employee->first_name . "." . $employee->lastname . "." . $employee->emp_no ."@employee.edu";
                $user->emp_no = $employee->emp_no;
                $user->password = bcrypt('password');
                $user->api_token = Str::random(80);
                $user->save();
            }
        });
    }
}
