<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['pieChart'] = Product::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"))
        // ->whereYear('created_at', date('Y'))
        // ->groupBy('brand')
        // ->orderBy('count')
        // ->get();

        // $data['pieChart'] = Product::select(\DB::raw(" 'COUNT' 'name', 'brand'"))
        // ->groupBy('brand')
        // ->get();

        $result = DB::select(DB::raw("select count(*) as total_brand, brand from products group by brand"));
        $chartData ="";
        foreach ($result as $list) {
            $chartData.="['".$list->brand."', ".$list->total_brand."],";
        }
        $arr['chartData'] =rtrim($chartData,",");

        // dd($result);

        // return view('admin.dashboard', [
        //     'arr' => $arr,
        // ]);

        return view ('admin.dashboard', $arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
