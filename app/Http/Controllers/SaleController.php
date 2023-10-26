<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::get();
        return view('admin.sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::get();
        $products = Product::get();
        return view('admin.sale.create', compact('clients','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $sale = Sale::create($request->all()+
            [ 
            'user_id'=>Auth::user()->id,
            'sale_date'=>Carbon::now('America/Lima')
            ]);

        foreach ($request->product_id as $key => $product) {
            $results[] = [
                "product_id" => $request->product_id[$key],
                "quantity" => $request->quantity[$key],
                "price" => $request->price[$key],
                "discount" => $request->discount[$key],
            ];
        }
        $sale->saleDetails()->createMany($results);

        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        $subtotal = 0 ;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
        }
        return view('admin.sale.show', compact('sale', 'saleDetails', 'subtotal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        $clients = Client::get();
        return view('admin.sale.edit', compact('sale', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Sale $sale)
    {
        // $sale->update($request->all());
        // return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        // $sale->delete();
        // return redirect()->route('sales.index');
    }

    public function pdf(Sale $sale)
    {
        $subtotal = 0;
        
        $saleDetails = $sale->saleDetails;
        foreach($saleDetails as $saleDetail){
            $subtotal += $saleDetail->quantity * $saleDetail->price;
        }
              

        $pdf = Pdf::loadView('admin.sale.pdf',  compact('sale','saleDetails','subtotal'));
        return $pdf->download('reporte-venta-'.$sale->id.'.pdf');
    }
}
