<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Admin_ProductController extends Controller
{
    // Display a listing of products
    public function index(Request $request)
{
    $query = Product::query();

    // Check if there's a search query
    if ($request->has('search') && $request->search != '') {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Check if there's a category filter
    if ($request->has('category_id') && $request->category_id != '') {
        $query->whereHas('categories', function($q) use ($request) {
            // Specify the table explicitly
            $q->where('categories.id', $request->category_id);
        });
    }

    $products = $query->with('categories')->get(); // Eager load categories
    $categories = Category::all(); // Get all categories for the filter

    return view('admin.products.index', compact('products', 'categories'));
}

    // Show the form for creating a new product
    public function create()
    {
        $categories=Category::all();

        return view('admin.products.create',['categories'=>$categories]); // Create this view
    }

    // Store a newly created product in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'=>'nullable',
            'price' => 'required|numeric|min:0',
            'category_ids' => 'array', // For category association
            'category_ids.*' => 'exists:categories,id', // Ensure each ID exists
        ]);

        
        $product=new Product();
        $product->name=$request->name;
        $product->description=$request->description;
         //upload image
         if($request->has('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $path='uploads/products/';
            $file->move($path,$filename);
            $product->image=$path.$filename;
        }
        $product->price=$request->price;
        $product->save(); 
        
        
        $product->categories()->attach($request->categories);
        
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }


    //show the specified product 
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product')); // Create this view
    }

    // Show the form for editing the specified product
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('admin.products.edit', compact('product','categories')); // Create this view
    }

    // Update the specified product in storage
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'=>'nullable',
            'price' => 'required|numeric|min:0',
            'category_ids' => 'array',
            'category_ids.*' => 'exists:categories,id',
        ]);

        $product->name=$request->name;
        $product->description=$request->description;
        if($request->has('image')){
            if(File::exists($product->image)){
                File::delete($product->image);
            }
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $path='uploads/products/';
            $file->move($path,$filename);
            $product->image=$path.$filename;
        }
        $product->price=$request->price;
        $product->save();
        $product->categories()->sync($request->categories_ids);        

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Remove the specified product from storage (soft delete)
    public function destroy(Product $product)
    {
        if(File::exists($product->image)){
            File::delete($product->image);
        }
        $product->delete(); // Soft delete
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

      //--deleted products function--
      public function deleted()
      {
          $deletedproducts = Product::onlyTrashed()->get();
          return view('admin.products.deleted', compact('deletedproducts'));
      }
  
       //--restore function--
      public function restore($id)
      {
          $product = Product::onlyTrashed()->findOrFail($id);
          $product->restore();
          return redirect()->route('products.deleted')->with('success', 'product restored successfully.');
      }
       //--forceDelete function--
      public function forceDelete($id)
      {
          $product = Product::onlyTrashed()->findOrFail($id)->forceDelete();
          if(File::exists($product->image)){
            File::delete($product->image);
        }
          return redirect()->route('products.deleted')->with('success', 'product deleted successfully.');
      }
}