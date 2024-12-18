<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;

class ChartDataController extends Controller
{
    public function salesAnalysis()
    {



        $salesData = [
            ['month' => 0, 'total_sales' => 0],
            ['month' => 1, 'total_sales' => 5000],
            ['month' => 2, 'total_sales' => 8000],
            ['month' => 3, 'total_sales' => 12000],
            ['month' => 4, 'total_sales' => 5000],
            ['month' => 5, 'total_sales' => 8000],
            ['month' => 6, 'total_sales' => 12000],
            ['month' => 7, 'total_sales' => 5000],
            ['month' => 8, 'total_sales' => 8000],
            ['month' => 9, 'total_sales' => 12000],
            ['month' => 10, 'total_sales' => 5000],
            ['month' => 11, 'total_sales' => 8000],
            ['month' => 12, 'total_sales' => 12000],
        ];

        return view('admin.totalsales', compact('salesData'));
    }


}
