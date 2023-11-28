<?php

namespace App\Services;


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
use App\Repositories\ClientsRepository;
use App\Repositories\HeaderRepository;
use App\Repositories\PracticeRepository;
use App\Repositories\ServicesRepository;
use App\Repositories\TestimonialsRepository;
use Illuminate\Support\Facades\Cache;


class PracticeService
{
    public function __construct(protected PracticeRepository $repository,protected FileUploadService $fileUploadService)
    {

    }

    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(5,['translations']);
    }

    public function store(PracticeRequest $practiceRequest)
    {
        $data = $practiceRequest->all();
        unset($data['_token']);
        $model = Practice::create($data);
        self::clearCache();
        return $model;
    }

    public function update($request,$model)
    {
        $data = $request->all();
        $model =   $this->repository->save($data,$model );
        self::clearCache();
        return $model;
    }


    public function delete($model)
    {
        self::clearCache();
        return $this->repository->delete($model);
    }

    public static function clearCache()
    {
       Cache::forget('practice');
    }

    public function cachedPractice()
    {
        return Cache::rememberForever('practice',fn() => $this->repository->all());
    }





}
