<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MainPage;


class CountCamp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'countcamp:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create full countcamp from the website rezaderakhshi.com';

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
$count=MainPage::First();
if($count->countcamp<4058)
{
$count->countcamp=$count->countcamp+1;
$count->save();
}
         $this->info('ok generate countcamp');

    }
}
