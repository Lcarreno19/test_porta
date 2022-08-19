<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\HomeController;

class CheckLogin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:login';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to check daily if a user has more than 30 days without logging in';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $controller = new HomeController();
        $controller->getBetsSubscribe();

    }
}
