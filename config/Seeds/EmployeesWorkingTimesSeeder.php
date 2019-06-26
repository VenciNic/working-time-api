<?php


use Phinx\Seed\AbstractSeed;

class EmployeesWorkingTimesSeeder extends AbstractSeed
{
        public function getDependencies()
    {
        return [
            'EmployeesProjectsSeeder'
        ];
    }
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $foreignKeys = $this->adapter->fetchAll('select id from employees_projects');
        $faker = \Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'employee_project_id' => $foreignKeys[array_rand($foreignKeys)]['id'],
                'working_time' => $faker->time('H:00:00'),
                'working_overtime' => $faker->time('H:00:00'),
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
        }

        $table = $this->table('working_times');
        $table->insert($data)->save();
    }
}
