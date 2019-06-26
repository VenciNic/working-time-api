<?php


use Phinx\Seed\AbstractSeed;

class EmployeesProjectsSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'EmployeesSeeder',
            'ProjectsSeeder'
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
        $stmt = $this->query('
            SELECT 
                employees.company_id as company_id, 
                employees.id as employee_id, 
                projects.id as project_id
            FROM my_app.employees
            JOIN projects ON 
                employees.company_id = projects.company_id
            LIMIT 5'
        );
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $table = $this->table('employees_projects');
        $table->insert($data)->save();
    }      
}
