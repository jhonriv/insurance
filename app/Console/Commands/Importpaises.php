<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Importpaises extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:paises';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa el archivo la base de datos de paises por defecto.';

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
        DB::unprepared(file_get_contents('database/migrations/paises.sql'));
        DB::unprepared(file_get_contents('database/migrations/estados.sql'));
        DB::unprepared(file_get_contents('database/migrations/ciudades.sql'));
    }
}
