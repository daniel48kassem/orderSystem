<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse(Model $model,$statusCode = 200)
    {
        $resourceClassName =  $this->resolveResource($model);
        $resource =  new $resourceClassName($model);
        return  response($resource,$statusCode);
    }

    public function sendResponseCollection($models,$statusCode = 200){
        $resourceClassName =  $this->resolveResource($models[0]);
        $resource =  $resourceClassName::collection($models);
        return  response($resource,$statusCode);
    }


    public function resolveResource(Model $model){
        $modelType = get_class($model);
        $resourceType = "/App/Http/Resource/".$modelType;
        return $resourceType;
    }
}
