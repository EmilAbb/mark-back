<?php

namespace App\Services;


use App\Http\Requests\HeaderRequest;
use App\Http\Requests\TestimonialsRequest;
use App\Models\Header;
use App\Models\Testimonial;
use App\Repositories\HeaderRepository;
use App\Repositories\TestimonialsRepository;
use Illuminate\Support\Facades\Cache;


class TestimonialService
{
    public function __construct(protected TestimonialsRepository $repository,protected FileUploadService $fileUploadService)
    {

    }

    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(5,['translations']);
    }

    public function store(TestimonialsRequest $testimonialsRequest)
    {
        $data = $testimonialsRequest->all();
        $data['image'] = $this->fileUploadService->uploadFile($testimonialsRequest->image, 'testimonials');
        unset($data['_token']);
        $model = Testimonial::create($data);
        self::clearCache();
        return $model;
    }

    public function update($request,$model)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $data['image'] = $this->fileUploadService->replaceFile($request->image, $model->image, 'header');
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
       Cache::forget('testimonials');
    }

    public function cachedTestimonials()
    {
        return Cache::rememberForever('testimonials',fn() => $this->repository->all());
    }





}
