<?php

namespace App\Console\Commands;

use App\Models\Integration;
use Illuminate\Console\Command;

class FindIntegration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'find:integration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Entegrasyon görüntüleme.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $integration_id = $this->ask('Görüntülemek istediğiniz entegrasyon id sini giriniz');
        $headers = ['id','user_id','marketplace','username','password','created_at','updated_at'];
        $data = Integration::where('id',$integration_id)->get()->toArray();
        $this->table($headers,$data);
    }
}
