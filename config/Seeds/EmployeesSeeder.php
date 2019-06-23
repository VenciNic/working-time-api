<?php


use Phinx\Seed\AbstractSeed;

class EmployeesSeeder extends AbstractSeed
{
    public function getDependencies()
    {
      return [CompaniesSeeder::class];
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
        $foreignKeys = $this->adapter->fetchAll('select id from companies');
        $faker = \Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'name' => $faker->name,
                'company_id' => $foreignKeys[array_rand($foreignKeys)]['id'],
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
        }

        $table = $this->table('employees');
        $table->insert($data)->save();
    }
}
