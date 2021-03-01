<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class inicio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inicio';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inicio del Proyecto';

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
        $this->line("-----------------");
        $this->info("PROCEDIMIENTOS:");
        $this->line("-----------------");
        $this->comment("Por favor realice en orden los siguientes procedimientos para artisan:");
        $this->comment(".- Cree en su phpmyadmin la base de datos 'insurance'.");
        $this->comment(".- migrate => Para Migrar las tablas a la base de Datos.");
        $this->comment(".- import:paises => Para cargar datos geogràficos de Prueba.");
        $this->comment(".- db:seed => Para cargar el usuario Administrador.");
        $this->comment(".- serve => inicie el Proyecto.");
    }
}
