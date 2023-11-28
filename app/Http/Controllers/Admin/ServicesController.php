<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\ServicesRequest;
use App\Http\Requests\TestimonialsRequest;
use App\Models\Header;
use App\Models\Service;
use App\Models\Testimonial;
use App\Services\HeaderService;
use App\Services\ServicesService;
use App\Services\TestimonialService;

class ServicesController extends Controller
{
    public ServicesService $service;
    public function __construct(ServicesService $service)
    {
        $this->service = $service;
    }

    public function getServicesData()
    {
        $servicesData = Service::all();
        return response()->json($servicesData);
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);

        return response()->json($service);
    }



    public function index()
    {
        $models=Service::with(['translations'])->paginate(5);
        return view('admin.services.index',['models'=>$models]);
    }

    public function create()
    {

        return view('admin.services.form');
    }

    public function store(ServicesRequest $servicesRequest)
    {
        $this->service->store($servicesRequest);
        return redirect()->route('admin.services.index');
    }

    public function edit(Service $service)
    {

        return view('admin.services.form',['model'=>$service]);
    }

    public function update(ServicesRequest $servicesRequest ,Service $service)
    {
        $this->service->update($servicesRequest,$service);
        return redirect()->back();
    }

    public function destroy(Service $service)
    {
        $this->service->delete($service);
        return redirect()->back();
    }
}
