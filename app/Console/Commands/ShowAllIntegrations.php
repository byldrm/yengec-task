<?php

namespace App\Console\Commands;

use App\Models\Integration;
use Illuminate\Console\Command;

class ShowAllIntegrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:integration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Entegrasyon listeleme.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $headers = ['id', 'user_id', 'marketplace', 'username', 'password', 'created_at', 'updated_at'];
        $data = Integration::all()->toArray();
        $this->table($headers, $data);
    }
}
