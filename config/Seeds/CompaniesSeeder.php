<?php


use Phinx\Seed\AbstractSeed;

class CompaniesSeeder extends AbstractSeed
{
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
        $faker = \Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 4; $i++) {
            $data[] = [
                'name' => $faker->company,
                'working_time' => $faker->time('H:00:00', $max = '12:00:00'),
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
        }

        $table = $this->table('companies');
        $table->insert($data)->save();
    }
}
