<?php namespace App\Console\Commands;

use App\Http\Controllers\PajakController;
use Illuminate\Console\Command;

class SkpdPbbGen extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'skpdPbbGen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generete SKPD PBB for all Pajak PBB';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $pajakController = new PajakController();
        $pajakController->genereteAllPbbSkpd();
    }

}
