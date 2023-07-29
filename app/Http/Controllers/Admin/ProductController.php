<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Product;
use App\Traits\UploadTrait;

class ProductController extends Controller
{
    use UploadTrait;

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = auth()->user()->store;
        
        $products = [];

        if($store) {
            $products = $store->products()->paginate(10);
        }

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::all(['id', 'name']);
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {        
        $data = $request->all();

        $categories = $request->get('categories', null);

        $store = auth()->user()->store;

        $product = $store->products()->create($data);
        $product->categories()->sync($categories);

        if($request->hasFile('photos')) {
            $imagesData = $this->imageUpload($request->file('photos'), 'image');

            $product->photos()->createMany($imagesData);
        }

        flash('Produto criado com sucesso!')->success();

        return redirect()->route('admin.products.edit', compact('product'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $categories = \App\Category::all(['id', 'name']);

        $product = $this->product->findOrFail($product);

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $product)
    {
        $data = $request->all();

        $product = $this->product->findOrFail($product);

        $product->update($data);

        $categories = $request->get('categories', null);

        $product->categories()->sync($categories);

        if($request->hasFile('photos')) {
            $imagesData = $this->imageUpload($request->file('photos'), 'image');

            $product->photos()->createMany($imagesData);
        }

        flash('Produto atualizado com sucesso!')->success();

        return redirect()->route('admin.products.edit', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $product = $this->product->findOrFail($product);

        $product->delete();

        flash('Produto removido com sucesso!')->success();

        return redirect()->route('admin.products.index');
    }
}
