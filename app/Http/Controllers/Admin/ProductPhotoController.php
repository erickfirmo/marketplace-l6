<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductPhoto;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    public function removePhoto(Request $request)
    {
        $photoName = $request->photoName;
        // Remover arquivo
        if(Storage::disk('public')->exists($photoName)) {
            Storage::disk('public')->delete($photoName);
        }

        // Remover registro do banco
        $removePhoto = ProductPhoto::where('image', $photoName);

        $productId = $removePhoto->first()->product_id;

        $removePhoto->delete();

        flash('Imagem removida com sucesso!')->success();

        return redirect()->route('admin.products.edit', ['product' => $productId]);
    }
}
