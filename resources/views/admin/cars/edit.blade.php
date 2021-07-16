@extends('admin.layouts.app')

@section('body')

<div class="p-6 bg-white border rounded-lg">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-primary">{{__('car.Edit Car')}}</h1>
        </div>

    </div>

    <div class="overflow-x-auto">
        <div class="inline-block min-w-full overflow-hidden align-middle">

            <form action="{{route('cars.update', $car->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}

                <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-1">

                    <div class="text-center items-center">
                        <img class="object-cover w-20 h-20 mx-auto overflow-hidden rounded-full shadow" src="{{$car->image}}" alt="Your car">
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">

                    <div>
                        <label class="text-gray-700">
                            {{__('car.Store')}}
                        </label>
                        <select name="store_id" class="block w-full h-10 mt-2 border-gray-200 rounded-md focus:border-green-500 focus:ring focus:ring-green-300 focus:ring-opacity-40
                        @error('store_id') border-red-500 @enderror" required>
                            <option value=""></option>
                            @foreach ($stores as $store)
                            <option value="{{$store->id}}"
                                {{ $store->id == $car->store_id ? 'selected' : ''}}>
                                {{$store->name}}
                            </option>
                            @endforeach
                        </select>
                            @error('store_id')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div>
                        <label class="text-gray-700">
                            {{__('car.Category')}}
                        </label>
                        <select name="category_id" class="block w-full h-10 mt-2 border-gray-200 rounded-md focus:border-green-500 focus:ring focus:ring-green-300 focus:ring-opacity-40
                        @error('category_id') border-red-500 @enderror" required>
                            <option value=""></option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}"
                                {{ $category->id == $car->category_id ? 'selected' : ''}}>
                                {{$category->name}}
                            </option>
                            @endforeach
                        </select>
                            @error('category_id')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                </div>

                <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">

                    <div>
                        <label class="text-gray-700">{{__('car.Name')}}</label>
                        <input type="text" name="name" value="{{$car->name}}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                            @error('name') border-red-500 @enderror"
                            required>
                            @error('name')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div>
                        <label class="text-gray-700">
                            {{__('car.Description')}}
                        </label>
                        <input type="text" name="description" value="{{$car->description}}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                            @error('description') border-red-500 @enderror" required>
                            @error('description')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">

                    <div>
                        <label class="text-gray-700">{{__('car.Price')}}</label>
                        <input type="number" step=".01" name="price" value="{{$car->price}}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                            @error('price') border-red-500 @enderror"
                            required>
                            @error('price')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div>
                        <label class="text-gray-700">
                            {{__('car.Brand')}}
                        </label>
                        <input type="text" name="brand" value="{{$car->brand}}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                            @error('brand') border-red-500 @enderror" required>
                            @error('brand')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">

                    <div>
                        <label class="text-gray-700">{{__('car.Model')}}</label>
                        <input type="text" name="model" value="{{$car->model}}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                            @error('model') border-red-500 @enderror"
                            required>
                            @error('model')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div>
                        <label class="text-gray-700">
                            {{__('car.Color')}}
                        </label>
                        <input type="text" name="color" value="{{$car->color}}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                            @error('color') border-red-500 @enderror" required>
                            @error('color')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">

                    <div>
                        <label class="text-gray-700">{{__('car.Type')}}</label>
                        <input type="text" name="type" value="{{$car->type}}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                            @error('type') border-red-500 @enderror"
                            required>
                            @error('type')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div>
                        <label class="text-gray-700">
                            {{__('car.Age')}}
                        </label>
                        <input type="number" name="age" value="{{$car->age}}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                            @error('age') border-red-500 @enderror" required>
                            @error('age')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">

                    <div>
                        <label class="text-gray-700">{{__('car.Kilometer')}}</label>
                        <input type="number" name="kilometer" value="{{$car->kilometer}}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                            @error('kilometer') border-red-500 @enderror"
                            required>
                            @error('kilometer')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div>
                        <label class="text-gray-700">{{__('car.Image')}}</label>
                        <input type="file" name="image"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                            @error('image') border-red-500 @enderror">
                            @error('image')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                </div>

                <div class="flex items-center mt-6">
                    <button type="submit"
                        class="px-4 py-2 mx-4 text-white rounded-md bg-green-800 hover:bg-green-700 focus:bg-green-700 focus:outline-none">
                        {{__('car.Edit')}}
                    </button>
                    <a href="{{route('cars.index')}}"
                        class="px-4 py-2 text-white rounded-md bg-red-800 hover:bg-red-700 focus:bg-red-700 focus:outline-none">
                        {{__('car.Cancel')}}
                    </a>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection
