<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\LegalRequest;
use App\Http\Requests\NewsRequest;
use App\Models\About;
use App\Models\Header;
use App\Models\Legal;
use App\Models\News;
use App\Models\Translation;
use App\Services\AboutService;
use App\Services\HeaderService;
use App\Services\LegalService;
use App\Services\NewsService;
use App\Services\TranslationsService;

class TranslationsController extends Controller
{
    public TranslationsService $service;
    public function __construct(TranslationsService $service)
    {
        $this->service = $service;
    }

    public function getTranslationsData($key)
    {
        $translation = Translation::where('key', $key)->first();

        if (!$translation) {
            return response()->json(['error' => 'Translation not found'], 404);
        }

        return response()->json($translation);
    }




    public function index()
    {
        $models=Translation::with(['translations'])->paginate(5);
        return view('admin.translation.index',['models'=>$models]);
    }

    public function create()
    {

        return view('admin.translation.form');
    }

    public function store()
    {
        $this->service->store();
        return redirect()->route('admin.translation.index');
    }

    public function edit(Translation $translation)
    {

        return view('admin.translation.form',['model'=>$translation]);
    }

    public function update(Translation $translation)
    {
        $this->service->update($translation);
        return redirect()->back();
    }

    public function destroy(Translation $translation)
    {
        $this->service->delete($translation);
        return redirect()->back();
    }
}
