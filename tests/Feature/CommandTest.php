<?php

namespace Tests\Feature;

use App\Models\Integration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommandTest extends TestCase
{
    /**
     * Test create new integration command
     *
     * @return void
     */
    public function test_create_new_integration_command()
    {
        $this->artisan('create:integration')
            ->expectsQuestion('Entegrasyon adını seçiniz.', 'n11')
            ->expectsQuestion('Kullanıcı adını giriniz.', 'test_test')
            ->expectsQuestion('Şifre Giriniz.', '12testpassword34')
            ->expectsQuestion('Kullanıcı id sini giriniz.', '1')
            ->expectsOutput('Entegrasyon eklendi.')
            ->assertExitCode(0);
    }

    /**
     * Test delete integration command
     *
     * @return void
     */
    public function test_delete_integration_command()
    {
        $integration = Integration::create([
            'marketplace'=>'n11',
            'username'=>'test',
            'password'=>'12password34',
            'user_id'=>'1'
        ]);
        $this->artisan('delete:integration')
            ->expectsQuestion('Silmek istediğiniz entegrasyon id sini giriniz.', $integration->id)
            ->expectsOutput('Entegrasyon silindi.')
            ->assertExitCode(0);
    }

    /**
     * Test update integration command
     *
     * @return void
     */
    public function test_update_integration_command()
    {
        $integration = Integration::create([
            'marketplace'=>'n11',
            'username'=>'test',
            'password'=>'12password34',
            'user_id'=>'1'
        ]);
        $this->artisan('update:integration')
            ->expectsQuestion('Güncellemek istediğiniz entegrasyon id sini giriniz.', $integration->id)
            ->expectsQuestion('Entegrasyon adını giriniz.','trendyol')
            ->expectsQuestion('Kullanıcı id sini giriniz.','1')
            ->expectsQuestion('Yeni kullanıcı adını giriniz.','testupdate')
            ->expectsQuestion('Yeni şifre giriniz.','12passwordupdate34')
            ->expectsOutput('Entegrasyon güncellendi.')
            ->assertExitCode(0);
    }
}
