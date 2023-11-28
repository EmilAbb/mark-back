<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\LegalRequest;
use App\Http\Requests\NewsRequest;
use App\Models\Header;
use App\Models\Legal;
use App\Models\News;
use App\Services\HeaderService;
use App\Services\LegalService;
use App\Services\NewsService;

class LegalController extends Controller
{
    public LegalService $service;
    public function __construct(LegalService $service)
    {
        $this->service = $service;
    }

    public function getLegalData()
    {
        $legalData = Legal::all();
        return response()->json(['legalData'=>$legalData]);
    }


    public function index()
    {
        $models=Legal::with(['translations'])->paginate(5);
        return view('admin.legal.index',['models'=>$models]);
    }

    public function create()
    {

        return view('admin.legal.form');
    }

    public function store(LegalRequest $legalRequest)
    {
        $this->service->store($legalRequest);
        return redirect()->route('admin.legal.index');
    }

    public function edit(Legal $legal)
    {

        return view('admin.legal.form',['model'=>$legal]);
    }

    public function update(LegalRequest $legalRequest ,Legal $legal)
    {
        $this->service->update($legalRequest,$legal);
        return redirect()->back();
    }

    public function destroy(Legal $legal)
    {
        $this->service->delete($legal);
        return redirect()->back();
    }
}
