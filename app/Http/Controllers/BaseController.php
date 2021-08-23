<?php

namespace App\Http\Controllers;

use App\Http\Resources\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    private $resourcesFolderPath = "App\Http\Resources\\";
    public function sendResponse(Model $model,$statusCode = 200)
    {
        $resourceClass =  $this->resolveResourceClass($model);
        $resource =  new $resourceClass($model);
        return  response($resource,$statusCode);
    }

    public function sendResponseCollection($models,$statusCode = 200){
        $resourceClass =  $this->resolveResourceClass($models[0]);
        $resource =  $resourceClass::collection($models);
        return  response($resource,$statusCode);
    }


    public function resolveResourceClass(Model $model){
        $modelType = class_basename($model);
        $resourceClassPath = $this->resourcesFolderPath.$modelType;

        return $resourceClassPath;
    }
}
