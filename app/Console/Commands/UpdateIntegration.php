<?php

namespace App\Console\Commands;

use App\Models\Integration;
use Illuminate\Console\Command;

class UpdateIntegration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:integration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Entegrasyon güncelleme.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $integration_id = $this->ask('Güncellemek istediğiniz entegrasyon id sini giriniz.');
        $marketplace = $this->choice('Entegrasyon adını giriniz.',['n11','trendyol']);
        $user_id = $this->ask('Kullanıcı id sini giriniz.');
        $username = $this->ask('Yeni kullanıcı adını giriniz.');
        $password = $this->ask('Yeni şifre giriniz.');

        $integration = Integration::find($integration_id);
        if (is_null($integration)) {
            $this->info('Entegrasyon bulunamadı.');
        } else {
            $integration->marketplace = $marketplace;
            $integration->user_id = $user_id;
            $integration->username = $username;
            $integration->password = $password;
            $integration->save();

            $this->info('Entegrasyon güncellendi.');
        }
    }
}
