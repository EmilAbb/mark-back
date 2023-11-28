<?php

namespace App\Services;


use App\Http\Requests\ClientsRequest;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\ServicesRequest;
use App\Http\Requests\TestimonialsRequest;
use App\Models\Client;
use App\Models\Header;
use App\Models\Service;
use App\Models\Testimonial;
use App\Repositories\ClientsRepository;
use App\Repositories\HeaderRepository;
use App\Repositories\ServicesRepository;
use App\Repositories\TestimonialsRepository;
use Illuminate\Support\Facades\Cache;


class ClientsService
{
    public function __construct(protected ClientsRepository $repository,protected FileUploadService $fileUploadService)
    {

    }

    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(5,['translations']);
    }

    public function store(ClientsRequest $clientsRequest)
    {
        $data = $clientsRequest->all();
        $data['image'] = $this->fileUploadService->uploadFile($clientsRequest->image, 'clients');
        unset($data['_token']);
        $model = Client::create($data);
        self::clearCache();
        return $model;
    }

    public function update($request,$model)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $data['image'] = $this->fileUploadService->replaceFile($request->image, $model->image, 'clients');
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
       Cache::forget('clients');
    }

    public function cachedClients()
    {
        return Cache::rememberForever('clients',fn() => $this->repository->all());
    }





}
