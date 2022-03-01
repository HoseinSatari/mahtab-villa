<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\CarbonPeriod;
use DateInterval;
use DatePeriod;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $days = [];
        foreach (Order::orwhere('status' , 'paid')->orwhere('status' , 'prepartion')->orwhere('status' , 'end')->get() as $item) {
            $period = CarbonPeriod::create($item['start'], $item['end']);
            foreach ($period as $day) {
                $days[] = convertToPersianNumber(jdate($day->format('Y-m-d'))->format('%Y-%m-%d'));
            }

        }

        $this->seo()->setTitle('صفحه اصلی')->setDescription('صفحه اصلی مجموعه مهتاب');
        return view('template.home', compact('days'));
    }

    public function about()
    {
        $this->seo()->setTitle('درباره ما')->setDescription('صفحه درباره ما خانه مهتاب');
        return view('template.about');
    }
}
