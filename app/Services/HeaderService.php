<?php

namespace App\Services;


use App\Http\Requests\HeaderRequest;
use App\Models\Header;
use App\Repositories\HeaderRepository;
use Illuminate\Support\Facades\Cache;


class HeaderService
{
    public function __construct(protected HeaderRepository $repository,protected FileUploadService $fileUploadService)
    {

    }

    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(5,['translations']);
    }

    public function store(HeaderRequest $headerRequest)
    {
        $data = $headerRequest->all();
        $data['image'] = $this->fileUploadService->uploadFile($headerRequest->image, 'header');
        $data['header_icon'] = $this->fileUploadService->uploadFile($headerRequest->header_icon, 'header');

        unset($data['_token']);
        $model = Header::create($data);
//        $model =  $this->repository->save($data,new Header());
        self::clearCache();
        return $model;
    }

    public function update($request,$model)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $data['image'] = $this->fileUploadService->replaceFile($request->image, $model->image, 'header');
        }

        if ($request->has('header_icon')) {
            $data['header_icon'] = $this->fileUploadService->replaceFile($request->header_icon, $model->header_icon, 'header');
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
       Cache::forget('header');
    }

    public function cachedHeader()
    {
        return Cache::rememberForever('header',fn() => $this->repository->all());
    }





}
