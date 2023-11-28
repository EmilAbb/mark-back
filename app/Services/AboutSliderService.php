<?php

namespace App\Services;


use App\Http\Requests\AboutSliderRequest;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\HomeSliderRequest;
use App\Models\AboutSlider;
use App\Models\Header;
use App\Models\HomeSlider;
use App\Repositories\AboutSliderRepository;
use App\Repositories\HeaderRepository;
use App\Repositories\HomeSliderRepository;
use Illuminate\Support\Facades\Cache;


class AboutSliderService
{
    public function __construct(protected AboutSliderRepository $repository,protected FileUploadService $fileUploadService)
    {

    }

    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(5,['translations']);
    }

    public function store(AboutSliderRequest $aboutSliderRequest)
    {
        $data = $aboutSliderRequest->all();
        $data['image'] = $this->fileUploadService->uploadFile($aboutSliderRequest->image, 'aboutSlider');
        unset($data['_token']);
        $model = AboutSlider::create($data);
        self::clearCache();
        return $model;
    }

    public function update($request,$model)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $data['image'] = $this->fileUploadService->replaceFile($request->image, $model->image, 'aboutSlider');
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
       Cache::forget('about_slider');
    }

    public function cachedAboutSlider()
    {
        return Cache::rememberForever('about_slider',fn() => $this->repository->all());
    }





}
