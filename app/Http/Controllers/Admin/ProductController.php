<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Color;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use PDF;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index()
    {
        // search dari pak dika
        return view('admin.products.index', [
            'products' => Product::latest()->filter(request(['search']))->paginate(3)
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status', '0')->get();
        // dd($brands);
        return view('admin.products.create', compact('categories', 'brands', 'colors'));
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();

        $category  = Category::findOrFail($validatedData['category_id']);

        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1':'0',
            'status' => $request->status == true ? '1':'0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description']
        ]);


        if($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';

            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $extention = $imageFile->getClientOriginalExtension();
                $fileName = time().$i++. '.' . $extention;
                $imageFile->move($uploadPath, $fileName);
                $finalImagePathName = $uploadPath.$fileName;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        if($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorQuantity[$key] ?? 0
                ]);
            }
        }

        return redirect('/admin/products')->with('message', 'Product Added Successfully.');
        // return $product->id;
    }

    public function edit(int $product_id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($product_id);
        return view('admin.products.edit', compact('categories', 'brands', 'product'));
    }

    public function update(ProductFormRequest $request, int $product_id)
    {
        $validatedData = $request->validated();

        $product = Category::findOrFail($validatedData['category_id'])
                            ->products()->where('id', $product_id)->first();

        if ($product) {
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                'trending' => $request->trending == true ? '1':'0',
                'status' => $request->status == true ? '1':'0',
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);

            if($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';
    
                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $extention = $imageFile->getClientOriginalExtension();
                    $fileName = time().$i++. '.' . $extention;
                    $imageFile->move($uploadPath, $fileName);
                    $finalImagePathName = $uploadPath.$fileName;
    
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
    
            return redirect('/admin/products')->with('message', 'Product Updated Successfully.');
              
        } else {
            return redirect('/admin/products')->with('message','No Such Product Id Found');
        }
        
    }

    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);
        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message','Product Image Deleted');
    }

    public function destroy(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        if($product->productImages) {
            foreach ($product->productImages as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message','Product Deleted with all its image');
    }

    public function exportPdf()
    {
        $products = Product::get();

        // $data = [
        //     'title' => 'Data Products',
        //     'products' => $products
        // ];

        $pdf = PDF::loadView('admin.products.export-pdf', [
            'title' => 'Data Products',
            'products' => $products,
        ])->setOptions(['defaultFont' => 'sans-serif']);

        // return $pdf->download('product-ecommerce.pdf');
        return $pdf->stream('product-ecommerce.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new ProductsExport, 'product-ecommerce.xlsx');
        // $products = Product::get();

        // $excel = Excel::loadView('admin.products.export-pdf', [
        //     'title' => 'Data Products',
        //     'products' => $products,
        // ])->setOptions(['defaultFont' => 'sans-serif']);

        // return $excel->download('product-ecommerce.xlsx');
    }

    // public function search(Request $request, $search)
    // {
        // $search = $request->search;
        
        // $products = Product::query()
        //             ->where('name', 'LIKE', "%{$search}%")
        //             ->orWhere('original_price', 'LIKE', "%{$search}%")
        //             ->get();

        // $users = User::where('active','1')->where(function($query) {
        // $query->where('email','jdoe@example.com')
        //             ->orWhere('email','johndoe@example.com');
        //     })->get();

        //     $result = Marriage::where('name','LIKE','%'.$email_or_name.'%')
        //         ->orWhere('email','LIKE','%'.$email_or_name.'%')
        //         ->get();

        // $products = Product::where('name', 'LIKE', '%'. $search .'%')
        //                     ->orWhere('original_price', 'LIKE', '%'. $search .'%')
        //                     ->get();

        // $products = Product::search('name original_price')->get();

    //     return view('admin.products.index', compact('products'));
    // }
}
