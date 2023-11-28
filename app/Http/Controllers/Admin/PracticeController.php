<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientsRequest;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\PracticeRequest;
use App\Http\Requests\ServicesRequest;
use App\Http\Requests\TestimonialsRequest;
use App\Models\Client;
use App\Models\Header;
use App\Models\Practice;
use App\Models\Service;
use App\Models\Testimonial;
use App\Services\ClientsService;
use App\Services\HeaderService;
use App\Services\PracticeService;
use App\Services\ServicesService;
use App\Services\TestimonialService;

class PracticeController extends Controller
{
    public PracticeService $service;
    public function __construct(PracticeService $service)
    {
        $this->service = $service;
    }

    public function getPracticeData()
    {
        $practiceData = Practice::all();
        return response()->json($practiceData);
    }

    public function index()
    {
        $models=Practice::with(['translations'])->paginate(5);
        return view('admin.practice.index',['models'=>$models]);
    }

    public function create()
    {
        return view('admin.practice.form');
    }

    public function store(PracticeRequest $practiceRequest)
    {
        $this->service->store($practiceRequest);
        return redirect()->route('admin.practice.index');
    }

    public function edit(Practice $practice)
    {

        return view('admin.practice.form',['model'=>$practice]);
    }

    public function update(PracticeRequest $practiceRequest ,Practice $practice)
    {
        $this->service->update($practiceRequest,$practice);
        return redirect()->back();
    }

    public function destroy(Practice $practice)
    {
        $this->service->delete($practice);
        return redirect()->back();
    }
}
