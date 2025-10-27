<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dishes = Dish::orderByDesc('id')->get();
        $tables = Table::all();

        $rawStatus = config('restaurant.order_status');
        $status = array_flip($rawStatus);
        $orders = Order::whereIn('status', [4])->get();

        return view('order_form', compact('dishes', 'tables', 'status', 'orders'));
    }

    public function submit(Request $request)
    {
        // Remove CSRF token and empty/zero values
        $data = array_filter($request->except('_token','table'));

        $orderId  = rand();
        // $request->table = (int)$request->table;
        
        foreach ($data as $dishId => $qty) {
            
            if ($qty > 1) {
                for ($i=0; $i <$qty ; $i++) { 
                    // // echo "Dish ID: $dishId - Quantity: $qty <br>";
                    $this->saveOrder($request, $dishId, $orderId );
                }
                
            }else {
                $this->saveOrder($request, $dishId, $orderId );
            }
        }
        return redirect('/')->with('message','Orders Submitted!');
    }
    public function saveOrder(Request $request, $dishId, $orderId)
    {
        $order = new Order();
        $order->order_id = $orderId;
        $order->dish_id = $dishId;
        $order->table_id = $request->table;
        $order->status = config('restaurant.order_status.new');
        $order->save();

    }
    public function serve(Order $order) 
    {
        $order->status = config('restaurant.order_status.done');
        $order->save();

        return redirect('/')->with('message', 'Order Serve to Customer');
    }
}
