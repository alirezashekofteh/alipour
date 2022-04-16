<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\SitemapController;
use Illuminate\Console\Command;
use App;
use DB;
use URL;

class SiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create full site map from the website rezaderakhshi.com';

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
//\App::call([SitemapController::class,'index']);
$sitemap=new SitemapController;
$sitemap->index();
         $this->info('ok generate site map');

    }
}
