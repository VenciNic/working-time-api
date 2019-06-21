<?php
use Migrations\AbstractMigration;

class CreateEmployeesProjects extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('employees_projects');
        $table->addColumn('employee_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('project_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addPrimaryKey(['employee_id', 'project_id']);
        
        $table->addForeignKey('employee_id', 'employees', 'id');
        
        $table->addForeignKey('project_id', 'projects', 'id');
        
        $table->create();
    }
}
