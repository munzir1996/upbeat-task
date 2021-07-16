@extends('admin.layouts.app')

@section('body')

<div class="p-6 bg-white border rounded-lg">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-primary">{{__('category.Edit Category')}}</h1>
        </div>

    </div>

    <div class="overflow-x-auto">
        <div class="inline-block min-w-full overflow-hidden align-middle">

            <form action="{{route('categories.update', $category->id)}}" method="post">
                @csrf
                {{ method_field('PUT') }}

                <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">

                    <div>
                        <label class="text-gray-700">
                            {{__('category.Parent Category')}}
                            <span class="text-blue-400">{{__('category.Optional')}}</span>
                        </label>
                        <select name="parent_category" class="block w-full h-10 mt-2 border-gray-200 rounded-md focus:border-green-500 focus:ring focus:ring-green-300 focus:ring-opacity-40
                        @error('parent_category') border-red-500 @enderror" disabled>
                            <option value=""></option>
                            @foreach ($parentCategories as $parentCategory)
                            <option value="{{$parentCategory->id}}"
                                {{ $parentCategory->id == $category->parent_category ? 'selected' : ''}}>
                                {{$parentCategory->name}}
                            </option>
                            @endforeach
                        </select>
                            @error('parent_category')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div>
                        <label class="text-gray-700">{{__('category.Name')}}</label>
                        <input type="text" name="name" value="{{$category->name}}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                            @error('name') border-red-500 @enderror"
                            required>
                            @error('name')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                </div>

                <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">
                    <div>
                        <label class="text-gray-700">
                            {{__('category.Description')}}
                            <span class="text-blue-400">{{__('category.Optional')}}</span>
                        </label>
                        <input type="text" name="description" value="{{$category->description}}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                            @error('description') border-red-500 @enderror">
                            @error('description')
                                <span class="error text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>

                <div class="flex items-center mt-6">
                    <button type="submit"
                        class="px-4 py-2 mx-4 text-white rounded-md bg-green-800 hover:bg-green-700 focus:bg-green-700 focus:outline-none">
                        {{__('category.Edit')}}
                    </button>
                    <a href="{{route('categories.index')}}"
                        class="px-4 py-2 text-white rounded-md bg-red-800 hover:bg-red-700 focus:bg-red-700 focus:outline-none">
                        {{__('category.Cancel')}}
                    </a>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection
