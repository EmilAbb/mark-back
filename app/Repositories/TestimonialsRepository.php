<?php

namespace App\Repositories;


use App\Models\Header;
use App\Models\Testimonial;


class TestimonialsRepository extends AbstractRepository
{
    protected $modelClass = Testimonial::class;

}
