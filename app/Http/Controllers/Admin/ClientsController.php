<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientsRequest;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\ServicesRequest;
use App\Http\Requests\TestimonialsRequest;
use App\Models\Client;
use App\Models\Header;
use App\Models\Service;
use App\Models\Testimonial;
use App\Services\ClientsService;
use App\Services\HeaderService;
use App\Services\ServicesService;
use App\Services\TestimonialService;

class ClientsController extends Controller
{
    public ClientsService $service;
    public function __construct(ClientsService $service)
    {
        $this->service = $service;
    }

    public function getClientsData()
    {
        $clients = Client::all();
        return response()->json($clients);
    }




    public function index()
    {
        $models=Client::with(['translations'])->paginate(5);
        return view('admin.clients.index',['models'=>$models]);
    }

    public function create()
    {

        return view('admin.clients.form');
    }

    public function store(ClientsRequest $clientsRequest)
    {
        $this->service->store($clientsRequest);
        return redirect()->route('admin.clients.index');
    }

    public function edit(Client $client)
    {

        return view('admin.clients.form',['model'=>$client]);
    }

    public function update(ClientsRequest $clientsRequest ,Client $client)
    {
        $this->service->update($clientsRequest,$client);
        return redirect()->back();
    }

    public function destroy(Client $client)
    {
        $this->service->delete($client);
        return redirect()->back();
    }
}
