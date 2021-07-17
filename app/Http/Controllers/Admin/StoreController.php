<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStoreRequest;
use App\Http\Requests\Admin\StoreUpdateRequest;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{

    public function __construct()
    {
        // Middleware only applied to these methods
        $this->middleware('permission:read',)->only(['index', 'show']);
        $this->middleware('permission:create')->only(['store', 'create']);
        $this->middleware('permission:update')->only(['edit', 'update', 'changeStatus']);
        $this->middleware('permission:delete')->only(['delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Stores = Store::all();

        return view('admin.stores.index', [
            'stores' => $Stores,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoreRequest $request)
    {
        $data = $request->validated();

        Store::create([
            'name' => $data['name'],
            'location' => $data['location'],
            'phone' => $data['phone'] ?? null,
            'password' => Hash::make($data['password']),
        ]);

        session()->flash('success', 'Store Added');

        return redirect()->route('stores.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('admin.stores.edit', [
            'store' => $store,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRequest $request, Store $store)
    {
        $data = $request->validated();

        $store->update([
            'name' => $data['name'],
            'location' => $data['location'],
            'phone' => $data['phone'] ?? null,
            'password' => Hash::make($data['password']) ?? $store->password,
        ]);

        session()->flash('success', 'Store Edited');

        return redirect()->route('stores.edit', $store->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();

        session()->flash('success', 'Store Deleted');

        return redirect()->route('stores.index');
    }

    public function changeStatus(Store $store)
    {
        if ($store->isActivate()) {
            $store->update([
                'status' => config('constants.status.inactive'),
            ]);

            session()->flash('success', 'Store Status Updated');

            return redirect()->route('stores.index');
        }

        if (! $store->isActivate()) {
            $store->update([
                'status' => config('constants.status.active'),
            ]);
            session()->flash('success', 'Store Status Updated');

            return redirect()->route('stores.index');
        }
    }

}
