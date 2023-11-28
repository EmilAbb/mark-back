<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeaderRequest;
use App\Models\Header;
use App\Services\HeaderService;

class HeaderController extends Controller
{
    public HeaderService $service;
    public function __construct(HeaderService $service)
    {
        $this->service = $service;
    }

    public function getHeaderData()
    {
        $headerImageData = Header::all();

        return response()->json($headerImageData);
    }

    public function index()
    {
        $models=Header::with(['translations'])->paginate(5);
        return view('admin.header.index',['models'=>$models]);
    }

    public function create()
    {

        return view('admin.header.form');
    }

    public function store(HeaderRequest $headerRequest)
    {
        $this->service->store($headerRequest);
        return redirect()->route('admin.header.index');
    }

    public function edit(Header $header)
    {

        return view('admin.header.form',['model'=>$header]);
    }

    public function update(HeaderRequest $headerRequest ,Header $header)
    {
        $this->service->update($headerRequest,$header);
        return redirect()->back();
    }

    public function destroy(Header $header)
    {
        $this->service->delete($header);
        return redirect()->back();
    }
}
