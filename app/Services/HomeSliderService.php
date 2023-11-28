<?php

namespace App\Services;


use App\Http\Requests\HeaderRequest;
use App\Http\Requests\HomeSliderRequest;
use App\Models\Header;
use App\Models\HomeSlider;
use App\Repositories\HeaderRepository;
use App\Repositories\HomeSliderRepository;
use Illuminate\Support\Facades\Cache;


class HomeSliderService
{
    public function __construct(protected HomeSliderRepository $repository,protected FileUploadService $fileUploadService)
    {

    }

    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(5,['translations']);
    }

    public function store(HomeSliderRequest $homeSliderRequest)
    {
        $data = $homeSliderRequest->all();
        $data['image'] = $this->fileUploadService->uploadFile($homeSliderRequest->image, 'homeSlider');
        $data['background_img_one'] = $this->fileUploadService->uploadFile($homeSliderRequest->background_img_one, 'homeSlider');
        $data['background_img_two'] = $this->fileUploadService->uploadFile($homeSliderRequest->background_img_two, 'homeSlider');

        unset($data['_token']);
        $model = HomeSlider::create($data);
        self::clearCache();
        return $model;
    }

    public function update($request,$model)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $data['image'] = $this->fileUploadService->replaceFile($request->image, $model->image, 'header');
        }

        if ($request->has('background_img_one')) {
            $data['background_img_one'] = $this->fileUploadService->replaceFile($request->background_img_one, $model->background_img_one, 'homeSlider');
        }
        if ($request->has('background_img_two')) {
            $data['background_img_two'] = $this->fileUploadService->replaceFile($request->background_img_two, $model->background_img_two, 'homeSlider');
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
       Cache::forget('home_slider');
    }

    public function cachedHomeSlider()
    {
        return Cache::rememberForever('home_slider',fn() => $this->repository->all());
    }





}
