<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Carbon\Carbon;

class DeletePaiement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete-paiement';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete paiement after 24 hours !';

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
        DB::table('paiements')->where('created_at', '<=', Carbon::now()->subDay())->delete();
    }
}
