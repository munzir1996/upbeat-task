<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarStoreRequest;
use App\Http\Requests\Admin\CarUpdateRequest;
use App\Models\Car;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();

        return view('admin.cars.index', [
            'cars' => $cars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::active()->get();
        $categories = Category::active()->get();

        return view('admin.cars.create', [
            'stores' => $stores,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarStoreRequest $request)
    {

        $data = $request->validated();

        $car = Car::create([
            'store_id' => $data['store_id'],
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'brand' => $data['brand'],
            'model' => $data['model'],
            'color' => $data['color'],
            'type' => $data['type'],
            'age' => $data['age'],
            'kilometer' => $data['kilometer'],
        ]);

        if ($request->has('image')) {
            $car->addMedia($request->image)->toMediaCollection('car');
        }

        session()->flash('success', 'Car Added');

        return redirect()->route('cars.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $stores = Store::active()->get();
        $categories = Category::active()->get();

        return view('admin.cars.edit', [
            'stores' => $stores,
            'categories' => $categories,
            'car' => $car,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarUpdateRequest $request, Car $car)
    {
        $data = $request->validated();

        $car->update([
            'store_id' => $data['store_id'],
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'brand' => $data['brand'],
            'model' => $data['model'],
            'color' => $data['color'],
            'type' => $data['type'],
            'age' => $data['age'],
            'kilometer' => $data['kilometer'],
        ]);

        if ($request->has('image')) {
            $car->addMedia($request->image)->toMediaCollection('car');
        }

        session()->flash('success', 'Car Edited');

        return redirect()->route('cars.edit', $car->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        session()->flash('success', 'Car Deleted');

        return redirect()->route('cars.index');
    }

    public function changeStatus(Car $car)
    {
        if ($car->isActivate()) {
            $car->update([
                'status' => config('constants.status.inactive'),
            ]);

            // session()->flash('success', 'تم إلغاء التفعيل بنجاح');

            return redirect()->route('cars.index');
        }

        if (! $car->isActivate()) {
            $car->update([
                'status' => config('constants.status.active'),
            ]);
            // session()->flash('success', 'تم التفعيل بنجاح');

            return redirect()->route('cars.index');
        }
    }

}
