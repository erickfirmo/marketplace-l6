<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Store;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    use UploadTrait;
    /**
     * Store model
     *
     * @var App\Store
     */
    protected $store;

    /**
     * Class constructor
     *
     * @param Store $store
     */
    public function __construct(Store $store)
    {
        $this->middleware('user.has.store')->only(['create', 'store']);
        $this->store = $store;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = auth()->user()->store;

        return view('admin.stores.index', compact('store'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = \App\User::all(['id', 'name']);

        return view('admin.stores.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->all();
        $user = auth()->user();

        if($user->store()->exists()) {
            flash('Seu usuário já possui uma loja cadastrada!')->error();

            return redirect()->route('admin.stores.index');
        }

        if($request->hasFile('logo')) {
            $data['logo'] = $this->imageUpload($request->file('logo'));
        }

        $store = $user->store()->create($data);

        flash('Loja criada com sucesso!')->success();

        return redirect()->route('admin.stores.edit', compact('store'));
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
    public function edit(Store $store)
    {
        $users = \App\User::all(['id', 'name']);

        return view('admin.stores.edit', compact('store', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $store)
    {
        $data = $request->all();
        $store = $this->store->findOrFail($store);
        
        if($request->hasFile('logo')) {
            if(Storage::disk('public')->exists($store->logo)) {
                Storage::disk('public')->delete($store->logo);
            }

            $data['logo'] = $this->imageUpload($request->file('logo'));
        }

        $store->update($data);

        flash('Loja atualizada com sucesso')->success();

        return redirect()->route('admin.stores.edit', [ 'store' => $store ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();

        flash('Loja removida com sucesso')->success();

        return redirect()->route('admin.stores.index');
    }
}
