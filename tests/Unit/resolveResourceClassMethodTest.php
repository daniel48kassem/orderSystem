<?php

namespace Tests\Unit;



use App\Http\Controllers\BaseController;
use App\Models\Order;
use Tests\TestCase;

class resolveResourceClassMethodTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    /**
     * @test
    */
    public function test_resolve_resource_class_method()
    {
        $controller = new BaseController();
        $controller->resolveResourceClass(new Order(["cost" => 33]));
    }



    /**
     * @test
     */
    public function test_send_response_method()
    {
        $controller = new BaseController();
        dd($controller->sendResponse(new Order(["cost" => 33])));
    }
}
