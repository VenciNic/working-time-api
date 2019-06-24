<?php
use Migrations\AbstractMigration;

class CreateWorkingTimes extends AbstractMigration
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
        $table = $this->table('working_times');
        $table->addColumn('employee_project_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('working_time', 'time', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('working_overtime', 'time', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addForeignKey('employee_project_id', 'employees_projects', 'id');
        $table->create();
    }
}
