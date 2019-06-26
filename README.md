# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Requirement
```bash
composer require fzaninotto/faker
```
Documentation of the plugin can be fount on [Faker](https://github.com/fzaninotto/Faker).


## Configuration

Read and edit `config/app.php` and setup the `'Datasources'`.
Run the folllowing migrations command to craete you database tables with relations:

```bash
bin/cake migrations migrate
```

To seed your database with test data, just run the command:

```bash 
php vendor/bin/phinx seed:run
```
## Usage

To create create a company you should send a POST request to http://localhost:8765/companies/add with json body in the following format:

    {
        "name": "COMPANY_NAME",
        "working_time": "H:i:s"
    }

To creation of an employee is in the same way http://localhost:8765/employees/add  

    {
        "company_id": "COMPANY_ID",
        "name": "EMPLOYEE_NAME"
    }

and for project http://localhost:8765/projects/add  

    {
        "company_id": "COMPANY_ID",
        "title": "PROJECT_TITLE"
    }

To assign a project to employee, you should send POST request as well to http://localhost:8765/employees-projects/add with valid company, project and employee.

    {
        "company_id": "COMPANY_ID",
		"project_id":"PROJECT_ID",
		"employee_id":"EMPLOYEE_ID"
    }

The registration of working hours is POST request to http://localhost:8765/working-times/add 
and json body:

    {
		"company_id": "COMPANY_ID",
	    	"employees_projects":{
			"project_id":"PROJECT_ID",
			"employee_id":"EMPLOYEE_ID"
	    	},

		"working_time":"H:i:s"
    }

To check the working hours visit http://localhost:8765/working-times for all records.

You can filter the working time by companies, employees and projects like that:

http://localhost:8765/employees-projects/view?company_id=COMPANY_ID&employee_id=EMPLOYEE_ID&project_id=PROJECT_ID

or one by one:

http://localhost:8765/employees-projects/view?employee_id=EMPLOYEE_ID
    
