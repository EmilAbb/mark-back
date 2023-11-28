<?php

namespace App\Services;


use App\Http\Requests\HeaderRequest;
use App\Http\Requests\ServicesRequest;
use App\Http\Requests\TestimonialsRequest;
use App\Models\Header;
use App\Models\Service;
use App\Models\Testimonial;
use App\Repositories\HeaderRepository;
use App\Repositories\ServicesRepository;
use App\Repositories\TestimonialsRepository;
use Illuminate\Support\Facades\Cache;


class ServicesService
{
    public function __construct(protected ServicesRepository $repository,protected FileUploadService $fileUploadService)
    {

    }

    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(5,['translations']);
    }

    public function store(ServicesRequest $servicesRequest)
    {
        $data = $servicesRequest->all();
        $data['image'] = $this->fileUploadService->uploadFile($servicesRequest->image, 'services');
        unset($data['_token']);
        $model = Service::create($data);
        self::clearCache();
        return $model;
    }

    public function update($request,$model)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $data['image'] = $this->fileUploadService->replaceFile($request->image, $model->image, 'service');
        }

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
       Cache::forget('services');
    }

    public function cachedServices()
    {
        return Cache::rememberForever('services',fn() => $this->repository->all());
    }





}
