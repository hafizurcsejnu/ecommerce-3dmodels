<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;



class ReportingController extends Controller
{
    public function exportUser()     {
        return Excel::download(new UsersExport, 'sales_report.xlsx');
    }
    
    public function exportPDF(Request $request){
        //dd($request);
        $starting_month = $request->starting_month;
        $ending_month = $request->ending_month;        
        if($ending_month == null){
            $starting_month = substr($starting_month,0,7);
            //dd($starting_month);
            $data = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')       
            ->select('products.*', 'order_details.created_at as order_date')
            ->where('order_details.created_at', 'like', '%' . $request->starting_month . '%')
            ->get();
        } 
        else{           
            $data = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')       
            ->select('products.*', 'order_details.created_at as order_date')
            ->whereBetween('order_details.created_at', [$starting_month, $ending_month])
            ->get();
        }
        $total = $data->count();   
        //dd($data);
        $pdf = PDF::loadView('pdf/sales_report', ['data' => $data, 'total' => $total, 'starting_month' => $starting_month, 'ending_month' => $ending_month,]);
        $name = 'sales';
        return $pdf->download($name.'_report.pdf');


    }
    public function sales(Request $request){
        //dd($request);
        $starting_month = $request->starting_month;
        $starting_month = $starting_month.'-01';
        $ending_month = $request->ending_month;        
        if($ending_month == null){
            $data = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')       
            ->select('products.*', 'order_details.created_at as order_date')
            ->where('order_details.created_at', 'like', '%' . $request->starting_month . '%')
            ->get();
        } 
        else{ 

            $ending_month = $ending_month.'-31';
            $from = date($starting_month);
            $to = date($ending_month);
            $data = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')       
            ->select('products.*', 'order_details.created_at as order_date')
            ->whereBetween('order_details.created_at', [$from, $to])
            ->get();
        }
        $total = $data->count();
       
        //dd($data);
        return view('admin.report_sales', ['data' => $data, 'total' => $total, 'starting_month' => $starting_month, 'ending_month' => $ending_month,]);

    }

    public function exportExcel(Request $request)
    {
      $starting_month = $request->starting_month;
      $ending_month = $request->ending_month; 

      if($ending_month == null){
        $data = DB::table('order_details')
        ->join('products', 'order_details.product_id', '=', 'products.id')       
        ->select('products.*', 'order_details.created_at as order_date')
        ->where('order_details.created_at', 'like', '%' . $request->starting_month . '%')
        ->get()->toArray();
    } 
    else{
        $ending_month = $ending_month.'-31';
        $data = DB::table('order_details')
        ->join('products', 'order_details.product_id', '=', 'products.id')       
        ->select('products.*', 'order_details.created_at as order_date')
        ->whereBetween('order_details.created_at', [$starting_month, $ending_month])
        ->get()->toArray();
    }
   

     $file_name = 'sales_report_'.$starting_month.'_to_'.$ending_month;
   
     $product_array[] = array('name', 'id', 'price', 'created_at');

     foreach($data as $item)
     {
      $product_array[] = array(
       'product name'  => $item->name,
       'product id'   => $item->id,
       'price'   => $item->price,
       'order date'   => $item->created_at       
      );
     }
     
     //Excel::download/Excel::store($product_array);
    //  Excel::create('Customer Data', function($excel) use ($product_array){
    //     $excel->setTitle('Customer Data');
    //     $excel->sheet('Customer Data', function($sheet) use ($product_array){
    //      $sheet->fromArray($product_array, null, 'A1', false, false);
    //     });
    //    })->download('xlsx');

       //Excel::download/Excel::store($product_array);
       Excel::raw($product_array, Excel::XLSX);

    }


}

