<?php

namespace App\Console\Commands;

use App\Models\Integration;
use Illuminate\Console\Command;

class DeleteIntegration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:integration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Entegrasyon silme.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $integration_id = $this->ask('Silmek istediğiniz entegrasyon id sini giriniz.');

        $integration = Integration::find($integration_id);
        if(is_null($integration)){
            $this->info('Entegrasyon bulunamadı.');
        }else{
            $integration->delete();
            $this->info('Entegrasyon silindi.');
        }


    }
}
