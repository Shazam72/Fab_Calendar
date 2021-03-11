<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class dbcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an mysql database with @name';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $name=$this->argument('name') ?: config('myconfig.databaseinfos.dbname');
        // $collation=config('myconfig.databaseinfos.db_collation','utf8mb4_unicode_ci');
        // $charset=config('myconfig.databaseinfos.db_charset','utf8mb4');

        // config(["database.connections.mysql.database" => null]);

        // DB::statement("CREATE DATABASE $name CHARACTER SET $charset COLLATE $collation");

        // config(['database.connections.mysql.database.database'=> $name]);

        // echo "Database $name was created with success";
    }
}
