<?php

namespace App\Http\Controllers\Admin;

use App\Events\ApprovedOrder;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show_order')->only(['index']);
        $this->middleware('can:cancel_order')->only(['cancel']);
        $this->middleware('can:delete_order')->only(['destroy']);


    }

    public function index()
    {
        $orders = Order::query();

        if ($serach = \request('search')) {
            $orders = $orders
                ->where('code', $serach)
                ->orWhereHas('user', function ($query) use ($serach) {
                    $query->where('name', 'LIKE', "%{$serach}%");
                })->orWhereHas('user', function ($query) use ($serach) {
                    $query->where('phone', $serach);
                });
            ;
        }
        $orders = $orders->where('status', \request('type'))->latest()->paginate(20);
        return view('panel.order.index', compact('orders'));
    }


    public function cancel(Order $id)
    {

        $id->update(['status' => 'cancel']);
        toastr()->success('رزرو کنسل شد. ');
        return redirect(route('admin.orders.index') . "?type=$id->status");
    }

    public function destroy(Order $order)
    {
        $order->delete();
        toastr()->success('سفارش با موفقیت حذف شد');
        return back();
    }
}
