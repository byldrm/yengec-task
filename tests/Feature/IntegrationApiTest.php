<?php

namespace Tests\Feature;

use App\Models\Integration;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IntegrationApiTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_integration_created_success_full()
    {

        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $integrationData = [
            'marketplace'=>'n11',
            'username'=>'test',
            'password'=>'12password34',
            'user_id'=>$user->id
        ];

        $this->json('POST', 'api/integrations', $integrationData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJson([
                'success'=>true,
                'data' => [
                    'marketplace'=>'n11',
                    'username'=>'test',
                    'password'=>'12password34'
                ],
                'message' => 'Entegrasyon başarıyla kaydedildi.'
            ]);
    }

    public function test_integration_update_success_full()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $integrationData = [
            'marketplace'=>'n11',
            'username'=>'test',
            'password'=>'12password34',
            'user_id'=>$user->id
        ];

        $integration = Integration::create($integrationData);

        $newIntegrationData = [
            'marketplace'=>'trendyol',
            'username'=>'testupdate',
            'password'=>'12password34',
            'user_id'=>$user->id
        ];

        $this->json('PUT', 'api/integrations/'.$integration->id, $newIntegrationData, ['Accept' => 'application/json'])

            ->assertJson([
                'success'=>true,
                'data' => [
                    'marketplace'=>'trendyol',
                    'username'=>'testupdate',
                    'password'=>'12password34',
                ],
                'message' => 'Entegrasyon başarıyla güncellendi.'
            ]);
    }

    public function test_integration_delete_success_full()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $integrationData = [
            'marketplace'=>'n11',
            'username'=>'test',
            'password'=>'12password34',
            'user_id'=>$user->id
        ];

        $integration = Integration::create($integrationData);
        $this->json('DELETE', 'api/integrations/'.$integration->id, ['Accept' => 'application/json'])

            ->assertJson([
                'success'=>true,
                'data' => '',
                'message' => 'Entegrasyon başarıyla silindi.'
            ]);
    }
}
