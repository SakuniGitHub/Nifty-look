<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function incomeSummary()
    {
        $totalIncome = Order::select(DB::raw('SUM(total_amount) as total'), DB::raw('DATE(created_at) as date'))
            ->where('status', 'completed')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();

        // Pass totalIncome as an array to the view
        $pdf = Pdf::loadView('pdf.income-summary', ['totalIncome' => $totalIncome]);
        return $pdf->download('income-summary.pdf');
        // return view('pdf.income-summary', compact('totalIncome'));
    }
}
