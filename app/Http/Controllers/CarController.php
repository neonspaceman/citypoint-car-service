<?php

namespace App\Http\Controllers;

use App\Domain\Car\Queries\GetAll;
use App\Domain\Car\Resources\CarResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class CarController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $cars = GetAll::dispatchSync();

        return CarResource::collection($cars);
    }
}
