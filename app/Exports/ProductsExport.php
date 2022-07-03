<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Product::all();
        return Product::select('id', 'name', 'selling_price', 'quantity')->get();
    }

    public function headings(): array  
    {
        return ["ID", "NAME", "PRICE", "QUANTITY"];
    }
}
