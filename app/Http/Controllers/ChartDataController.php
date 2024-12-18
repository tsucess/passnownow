<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;
use App\Models\Transaction;

class ChartDataController extends Controller
{
    public function salesAnalysis()
    {

        $salesData = Transaction::where('payment_status', 'success')->get();
        // dd($salesData);

        // $salesData = [
        //     ['month' => 0, 'total_sales' => 0],
        //     ['month' => 1, 'total_sales' => 5000],
        //     ['month' => 2, 'total_sales' => 8000],
        //     ['month' => 3, 'total_sales' => 12000],
        //     ['month' => 4, 'total_sales' => 5000],
        //     ['month' => 5, 'total_sales' => 8000],
        //     ['month' => 6, 'total_sales' => 12000],
        //     ['month' => 7, 'total_sales' => 5000],
        //     ['month' => 8, 'total_sales' => 8000],
        //     ['month' => 9, 'total_sales' => 12000],
        //     ['month' => 10, 'total_sales' => 5000],
        //     ['month' => 11, 'total_sales' => 8000],
        //     ['month' => 12, 'total_sales' => 12000],
        // ];


$data = array();

$data = [
    ['month' => 0, 'total_sales' => 0]
];

        $salesData = Transaction::selectRaw('MONTH(created_at) as month, SUM(amount) as total_sales')
        ->groupBy('month')
        ->orderBy('month')
        ->get()
        ->pluck('total_sales', 'month'); // Key: month, Value: total_sales

        // Create a complete list of months (1 to 12) with 0 sales
        $completeSalesData = collect(range(1, 12))->mapWithKeys(function ($month) use ($salesData) {
            return [$month => $salesData[$month] ?? 0]; // Use database data if exists, else 0
        });

        // Convert to a format suitable for Chart.js
        $salesData = $completeSalesData->map(function ($sales, $month) {
            return [
                'month' => $month,
                'total_sales' => $sales,
            ];
        })->values();


        // dd($salesData );
// foreach ($salesData as $sData) {
//    dd($sData);
// }
// dd($data);
// dd($salesData);
        return view('admin.totalsales', compact('salesData'));
    }


}
