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
        // Sum the 'amount' column where 'status' is 'successful'
        $totalAmount = Transaction::where('payment_status', 'success')->sum('amount');


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

        $salesData = Transaction::selectRaw('MONTH(updated_at) as month, SUM(amount) as total_sales')
        ->groupBy('month')
        ->where('payment_status', 'success')
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
        return view('admin.totalsales', compact('salesData', 'totalAmount'));
    }




    //Order function
    public function orderAnalysis()
{
    // Count transactions per month
    $monthlyTransactionCounts = Transaction::selectRaw('MONTH(updated_at) as month, COUNT(*) as transaction_count')
        ->where('payment_status', 'success') // Only successful transactions
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    // Ensure all months are represented
    $completeTransactionData = collect(range(1, 12))->mapWithKeys(function ($month) use ($monthlyTransactionCounts) {
        $monthlyCount = $monthlyTransactionCounts->firstWhere('month', $month);
        return [$month => $monthlyCount ? $monthlyCount->transaction_count : 0];
    });

    // Convert to a format suitable for Chart.js
    $transactionData = $completeTransactionData->map(function ($count, $month) {
        return [
            'month' => $month,
            'transaction_count' => $count,
        ];
    })->values();

    return view('admin.order', compact('transactionData'));
}









public function showStats()
{
        //successful order
      $successfulOrders = Transaction::where('payment_status', 'success')->count();


      //plan name
      $planDaily = Transaction::where('plan_name', 'daily')->count();
      $planWeekly = Transaction::where('plan_name', 'weekly')->count();
      $planMonthly = Transaction::where('plan_name', 'monthly')->count();
      $planQuarterly = Transaction::where('plan_name', '3 months')->count();
      $planAnnually = Transaction::where('plan_name', 'yearly')->count();
      $services = Transaction::where('services', 'services')->count();
      $resources = Transaction::where('services', 'resources')->count();

         // Sum the 'amount' column where 'status' is 'successful'
         $totalAmount = Transaction::where('payment_status', 'success')->sum('amount');

       $dataForFirstGraph1 = Transaction::where('payment_status', 'success')->get();



    $data = array();

    $data = [
        ['month' => 0, 'total_sales' => 0]
    ];



$dataForFirstGraph1  = Transaction::selectRaw('MONTH(updated_at) as month, SUM(amount) as total_sales')
        ->groupBy('month')
        ->where('payment_status', 'success')
        ->orderBy('month')
        ->get()
        ->pluck('total_sales', 'month'); // Key: month, Value: total_sales


// Create a complete list of months (1 to 12) with 0 sales
$completeSalesData = collect(range(1, 12))->mapWithKeys(function ($month) use ($dataForFirstGraph1) {
    return [$month => $dataForFirstGraph1[$month] ?? 0]; // Use database data if exists, else 0
});


// Convert to a format suitable for Chart.js
$dataForFirstGraph = $completeSalesData->map(function ($sales, $month) {
    return [
        'month' => $month,
        'total_sales' => $sales,
    ];
})->values();




// Count transactions per month
$dataForSecondGraph2 = Transaction::selectRaw('MONTH(updated_at) as month, COUNT(*) as count')
->where('payment_status', 'success') // Only successful transactions
->groupBy('month')
->orderBy('month')
->get();

// Ensure all months are represented
$completeTransactionData = collect(range(1, 12))->mapWithKeys(function ($month) use ($dataForSecondGraph2) {
$monthlyCount = $dataForSecondGraph2->firstWhere('month', $month);
return [$month => $monthlyCount ? $monthlyCount->count : 0];
});

// Convert to a format suitable for Chart.js
$dataForSecondGraph = $completeTransactionData->map(function ($count, $month) {
return [
    'month' => $month,
    'count' => $count,
];
})->values();


    return view('admin.detailedstat', compact('successfulOrders', 'services', 'resources', 'planDaily', 'planWeekly', 'planMonthly',  'planQuarterly', 'planAnnually',  'totalAmount', 'dataForFirstGraph', 'dataForSecondGraph'));
}




// public function index()
// {
//     // Count successful orders


//     // Pass the count to the view
//     return view('detailedstat', compact('successfulOrders'));
// }
}
