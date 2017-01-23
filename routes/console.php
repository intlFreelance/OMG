<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('fullDbBackup', function(){
    $conn = env('DB_CONNECTION');
    if($conn == "mysql"){
        $host = env('DB_HOST');
        $port = env('DB_PORT');
        $user = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $database = env('DB_DATABASE');
        $date = date('Ymd_his');
        $mysqlDumpPath = ""; 
        if(!empty(config('database.mysqldump_path'))){
            $mysqlDumpPath = config('database.mysqldump_path');
            if((substr($mysqlDumpPath, -1) != '/')){
                $mysqlDumpPath.="/";
            }
        }
        $backupPath = database_path()."/backups";
        if(!file_exists($backupPath)){
            mkdir($backupPath);
        }
        $cmd = "{$mysqlDumpPath}mysqldump -P{$port} -h{$host} -u{$user} -p{$password} {$database} -R -e --triggers --single-transaction > {$backupPath}/db_backup_{$date}.sql";
        $this->comment($cmd);    
        return;
        $output = exec($cmd);
        $this->comment($output);    
    }else{
        $this->comment("This command is defined for MySQL Databases only.");    
    }
})->describe('Saves SQL dump of entire database.');