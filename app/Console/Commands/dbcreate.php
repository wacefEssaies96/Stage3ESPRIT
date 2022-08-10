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
    protected $signature = 'db:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to create a MySQL DataBase: every db:create need an optional parameter(DB name)';

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
        $shemaName = $this->argument('name') ?: config('database.connections.mysql.database');
        $charset = config('database.connections.mysql.charset', 'utf8mb4');
        $collation = config('database.connections.mysql.collation', 'utf8mb4_general_ci');

        config(['database.connections.mysql.database' => null]);
        
        $query = "DROP DATABASE $shemaName;";
        DB::statement($query);
        $query = "CREATE DATABASE IF NOT EXISTS $shemaName CHARACTER SET $charset COLLATE $collation;";
        DB::statement($query);
        echo "DataBase $shemaName successfully created !\n";
        
        config(['database.connections.mysql.database' => $shemaName]);
    }
}
