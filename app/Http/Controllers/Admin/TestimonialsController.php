<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\TestimonialsRequest;
use App\Models\Header;
use App\Models\Testimonial;
use App\Services\HeaderService;
use App\Services\TestimonialService;

class TestimonialsController extends Controller
{
    public TestimonialService $service;
    public function __construct(TestimonialService $service)
    {
        $this->service = $service;
    }

   public function getTestiData ()
   {
        $testiData = Testimonial::all();
        return response()->json($testiData);
   }

    public function index()
    {
        $models=Testimonial::with(['translations'])->paginate(5);
        return view('admin.testimonials.index',['models'=>$models]);
    }

    public function create()
    {

        return view('admin.testimonials.form');
    }

    public function store(TestimonialsRequest $testimonialsRequest)
    {
        $this->service->store($testimonialsRequest);
        return redirect()->route('admin.testimonials.index');
    }

    public function edit(Testimonial $testimonial)
    {

        return view('admin.testimonials.form',['model'=>$testimonial]);
    }

    public function update(TestimonialsRequest $testimonialsRequest ,Testimonial $testimonial)
    {
        $this->service->update($testimonialsRequest,$testimonial);
        return redirect()->back();
    }

    public function destroy(Testimonial $testimonial)
    {
        $this->service->delete($testimonial);
        return redirect()->back();
    }
}
