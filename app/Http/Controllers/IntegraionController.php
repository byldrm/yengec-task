<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntegrationRequest;
use App\Http\Resources\IntegrationResource;
use App\Models\Integration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IntegraionController extends BaseController
{

    public function __construct()
    {
        $this->authorizeResource(Integration::class, 'integration');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = Integration::where('user_id', Auth::id())->paginate(15);
        $collection = IntegrationResource::collection($data);
        $response = $this->addPagination($data, $collection);
        return $this->sendResponse($response, 'Entegrasyonlar başarıyla listelendi.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(IntegrationRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $Integration = Integration::create($data);
        return $this->sendResponse(new IntegrationResource($Integration), 'Entegrasyon başarıyla kaydedildi.', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Integration $integration
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Integration $integration)
    {
        return $this->sendResponse(new IntegrationResource($integration), 'Entegrasyon başarıyla alındı.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Integration $integration
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(IntegrationRequest $request, Integration $integration)
    {

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $integration->update($data);
        return $this->sendResponse(new IntegrationResource($integration), 'Entegrasyon başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Integration $integration
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Integration $integration)
    {
        $integration->delete();
        return $this->sendResponse('', 'Entegrasyon başarıyla silindi.');
    }
}
