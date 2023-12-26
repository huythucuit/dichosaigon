<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index()
    {

        // $products = Product::latest()->get();
        $products = Product::latest()->get(); // 10 sản phẩm mỗi trang
        return view('product.index', compact('products'));
    }

    public function ManagePost()
    {

        // $products = Product::latest()->get();
        $products = Product::latest()->get(); // 10 sản phẩm mỗi trang
        return view('product.managepost', compact('products'));
    }


    public function EditPost($Id)
    {
        $product_info = Product::findOrFail($Id);
      //  $products = Product::latest()->get();
        return view('product.editpost', compact('product_info'));
    }
    public function UpdatePost(Request $request)
    {
        $Id = $request->Id;

        $request->validate([
            'ProductName' => 'required:products,ProductName,' . $Id . ',Id'
        ]);



        $product = Product::findOrFail($Id);

    // Check if an image is provided
    // if ($request->hasFile('productImage')) {
        
    
    //     // Tiến hành tải lên ảnh mới
    //     $image = $request->file('productImage');
    //     $imgname = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    //     $request->productImage->move(public_path('upload'), $imgname);
    //     $imgurl = 'upload/' . $imgname;
    
    //     // Cập nhật thông tin sản phẩm với ảnh mới
    //     $product->update([
    //         'productImage' => $imgurl,
    //     ]);
    // }

    // Check if the user wants to delete the image
   
    $product->update([
        'ProductName' => $request->ProductName,
        'SalePrice' => $request->SalePrice,
        'CategoryName' => $request->CategoryName,
        'ImageLink' => $request->ImageLink,
        'ProductLink' => $request->ProductLink,
    ]);

        return redirect()->route('managepost');
    }

    public function SearchProduct(Request $request)
    {
        $searchQuery = $request->input('q');
        $products = Product::where('ProductName', 'like', '%' . $searchQuery . '%')->get();

        return view('product.index', compact('products'));
    }

    public function DeletePost($Id)
    {
        $product = Product::findOrFail($Id);
    
        // Thay đổi trạng thái isActive về 0
        $product->delete();
    
        return redirect()->route('managepost');
    }


    public function CreatePost()
    {
        return view('product.createpost');
    }
    public function StorePost(Request $request)
    {
        //     $request->validate([
        //        'categoryName' => 'required|unique:categories'
        //   ]);
        $validator = Validator::make($request->all(), [
            'ProductName' => 'required|unique:categories'
        ]);

        Product::insert([
            'ProductName' => $request->ProductName,
            'SalePrice' => $request->SalePrice,
            'CategoryName' => $request->CategoryName,
            'ImageLink' => $request->ImageLink,
            'ProductLink' => $request->ProductLink,
        ]);

        return redirect()->route('managepost');

    }
}
