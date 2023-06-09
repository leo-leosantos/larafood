<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreClientRequest;
use App\Http\Resources\ClientResource;
use App\Services\ClientService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function store(StoreClientRequest $request)
    {
        if (!$client = $this->clientService->createNewClient($request->all())) {
            return response()->json(['message' => 'Error new Client '], 404);
        }
        return new ClientResource($client);
    }
}
