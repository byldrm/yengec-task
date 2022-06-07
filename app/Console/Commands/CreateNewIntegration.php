<?php

namespace App\Console\Commands;

use App\Models\Integration;
use Illuminate\Console\Command;

class CreateNewIntegration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:integration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Yeni entegrasyon kaydetme.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $marketplace = $this->choice('Entegrasyon adını seçiniz.',['n11','trendyol']);
        $username = $this->ask('Kullanıcı adını giriniz.');
        $password = $this->ask('Şifre Giriniz.');
        $user_id = $this->ask('Kullanıcı id sini giriniz.');

        Integration::create([
            'marketplace' => $marketplace,
            'username' => $username,
            'password' => $password,
            'user_id' => $user_id,
        ]);

        $this->info('Entegrasyon eklendi.');
    }
}
