<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/** @psalm-suppress PropertyNotSetInConstructor */
class DatabaseCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create database';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $schemaName = DB::getDatabaseName();
        DB::statement('CREATE DATABASE :schema', ['schema' => $schemaName]);
    }
}
