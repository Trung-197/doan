<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function productSold()
    {
        $result = DB::table('carts')->selectRaw('sum(pty) as pty')
            ->groupByRaw('MONTH(created_at)')
            ->orderByDesc('pty')
            ->first(1);
        $sum = DB::table('carts')->selectRaw('sum(pty) as pty')
            ->first();
        $sumNow = DB::table('carts')->selectRaw('sum(pty) as pty')
            ->whereMonth('created_at','=',Carbon::now())
            ->first();
        $data = DB::table('carts')->select('customer_id','created_at')->get()->groupBy(function ($data)
        {
            return Carbon::parse($data->created_at)->format('M');
        });
        $max = null;
        $months = [];
        $monthCount =[];
        foreach ($data as $month => $value)
        {
            $months[] = $month;
            $monthCount[] = count($value);
            $max = max($monthCount);
        }

        return view('backend.report.report',[
            'data'=>$data,
            'months' => $months,
            'monthCount' => $monthCount,
            'max' => $max,
            'result' => $result,
            'sum'=> $sum,
            'sumNow' => $sumNow,
        ]);
    }
    public function revenue()
    {
        $result = DB::table('carts')->selectRaw('sum(price*pty) as price')
            ->groupByRaw('MONTH(created_at)')
            ->first();
        $sum = DB::table('carts')->selectRaw('sum(price*pty) as price')
            ->whereDay('created_at','=',Carbon::now())
            ->first();
        $sumNow = DB::table('   carts')->selectRaw('sum(price*pty) as price')
            ->whereMonth('created_at','=',Carbon::now())
            ->first();
        $data = DB::table('carts')->select('pty','created_at')->get()->groupBy(function ($data)
        {
            return Carbon::parse($data->created_at)->format('M');
        });
        $max = null;
        $months = [];
        $monthCount =[];
        foreach ($data as $month => $value)
        {
            $months[] = $month;
            $monthCount[] = count($value);
            $max = max($monthCount);
        }

        return view('backend.report.report_revenue',[
            'data'=>$data,
            'months' => $months,
            'monthCount' => $monthCount,
            'max' => $max,
            'result' => $result,
            'sum'=> $sum,
            'sumNow' => $sumNow,
        ]);
    }

}
