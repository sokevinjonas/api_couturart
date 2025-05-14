<?php

namespace App\Console\Commands;

use App\Models\Abonnement;
use Illuminate\Console\Command;

class ExpireAbonnements extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'abonnements:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Met à jour les abonnements expirés automatiquement.';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        Abonnement::where('status', 'active')
        ->where('ends_at', '<', now())
        ->update(['status' => 'expire']);

        $this->info('Abonnements expirés avec succès.');
    }
}
