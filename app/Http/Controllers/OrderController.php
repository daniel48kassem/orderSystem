<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\Product as ProductResource;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\RequestStack;

class OrderController extends Controller
{
    public function post(OrderRequest $request)
    {
        $productIds = collect($request->products)->get('id');
        $productsFromDatabase = collect(Product::whereIn("id", $productIds)->get());

        $cost = 0;
        foreach ($request->products as $product) {

            $productFromDatabase = $productsFromDatabase->where("id", $product->id)->first();

            if ($product->quantity > $productFromDatabase->quatity)
                return response(409);

            $cost += $productFromDatabase->price * $product->quantity;

            $productFromDatabase->update([
                'quantity' => $productFromDatabase->quantity - $product->quantity
            ]);
        }

        $order = Order::create([
            "cost" => $cost
        ]);

        $order->attach($productIds);

        $order->load("products");

        return $this->sendResponse($order);
    }

    public function get(Order $order)
    {
        $order->load('products');
        return $this->sendResponse($order);
    }


    public function getUserOrders(){
        $orders = auth()->user()->orders();
        return $this->sendResponse($orders);
    }

    public function delete(Order $order)
    {
        $order->detach();
        $order->delete();
        return response(200);
    }
}
