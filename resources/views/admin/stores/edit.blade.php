@extends('admin.layouts.app')

@section('body')

<div class="p-6 bg-white border rounded-lg">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-primary">{{__('store.Edit Store')}}</h1>
        </div>

    </div>

    <div class="overflow-x-auto">
        <div class="inline-block min-w-full overflow-hidden align-middle">

            <form action="{{route('stores.update', $store->id)}}" method="post">
                @csrf
                {{ method_field('PUT') }}

                <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">
                    <div>
                        <label class="text-gray-700">{{__('store.Name')}}</label>
                        <input type="text" name="name" value="{{$store->name}}"
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
                        <label class="text-gray-700">{{__('store.Location')}}</label>
                        <input type="text" name="location" value="{{$store->location}}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                            @error('location') border-red-500 @enderror"
                            required>
                            @error('location')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">
                    <div>
                        <label class="text-gray-700">
                            {{__('store.Phone')}}
                            <span class="text-blue-400">{{__('store.Optional')}}</span>
                        </label>
                        <input type="text" name="phone" value="{{$store->phone}}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                            @error('phone') border-red-500 @enderror"
                            required>
                            @error('phone')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div>
                        <label class="text-gray-700">{{__('store.Password')}}
                            <span class="text-blue-400">{{__('store.Optional')}}</span>
                        </label>
                        <input type="password" name="password"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                            @error('password') border-red-500 @enderror">
                            @error('password')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>

                <div class="flex items-center mt-6">
                    <button type="submit"
                        class="px-4 py-2 mx-4 text-white rounded-md bg-green-800 hover:bg-green-700 focus:bg-green-700 focus:outline-none">
                        {{__('store.Edit')}}
                    </button>
                    <a href="{{route('stores.index')}}"
                        class="px-4 py-2 text-white rounded-md bg-red-800 hover:bg-red-700 focus:bg-red-700 focus:outline-none">
                        {{__('store.Cancel')}}
                    </a>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection
