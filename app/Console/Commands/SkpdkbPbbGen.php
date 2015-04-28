<?php namespace App\Console\Commands;

use App\Http\Controllers\PajakController;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SkpdkbPbbGen extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'skpdkbPbbGen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generete SKPDKB PBB for all unpaid SKPD PBB';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $pajakController = new PajakController();
        $pajakController->genereteAllPbbSkpdkb(Carbon::now()->year);
    }

}
