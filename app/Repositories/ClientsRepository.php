<?php

namespace App\Repositories;


use App\Models\Client;
use App\Models\Header;
use App\Models\Service;
use App\Models\Testimonial;


class ClientsRepository extends AbstractRepository
{
    protected $modelClass = Client::class;

}
