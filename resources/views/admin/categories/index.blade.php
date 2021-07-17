@extends('admin.layouts.app')

@push('css')
<link rel="stylesheet" href="{{asset('vendor/css/datatables.min.css')}}">
@endpush

@section('body')

<div class="p-6 bg-white border rounded-lg">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-primary">{{__('category.Category')}}</h1>
        </div>
        @role('super-admin', 'admin')

        <a href="{{route('categories.create')}}"
            class="px-4 py-2 text-white rounded-md bg-green-800 hover:bg-green-700 focus:bg-green-700 focus:outline-none">
            {{__('category.Add Category')}}
        </a>
        @endrole
    </div>

    <div class="overflow-x-auto">
        <div class="inline-block min-w-full overflow-hidden align-middle">
            <table class="min-w-full text-sm text-gray-500 lg:text-base" id="categories-table" cellspacing="0">
                <thead>
                    <tr class="h-12">
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">#</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">{{__('category.Name')}}</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">{{__('category.Description')}}</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">{{__('category.Status')}}</th>
                        <th class="px-6 py-4 text-center"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                    <tr class="text-gray-700">
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$category->id}}
                        </td>

                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$category->name}}
                        </td>

                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$category->description}}
                        </td>

        @role('super-admin', 'admin')
                        <td>
                            <a href="{{route('categories.change_status', $category->id)}}" class="text-center px-2 py-0.5 mx-2 text-sm
                                {{$category->status == config('constants.status.active') ? 'text-red-600 hover:bg-red-200 bg-red-100' : 'text-green-600 hover:bg-green-200 bg-green-100' }} rounded-full">
                                @if ($category->status == config('constants.status.active'))
                                {{__('category.Inactive')}}
                                @else
                                {{__('category.Active')}}
                                @endif
                            </a>
                        </td>
@endrole
                        <td class="flex flex-row -mx-2 text-center">
                            @role('super-admin', 'admin')

                            <a href="{{route('categories.edit', $category->id)}}" class="p-2 mx-2 text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                            clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                            <form action="{{route('categories.destroy', $category->id)}}" method="post">
                                    @csrf {{ method_field('DELETE') }}
                                <button type="submit" class="p-2 mx-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </form>
                            @endrole
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


@push('js')
<script src="{{ asset('vendor/js/datatables.min.js') }}"></script>
<script src="{{ asset('vendor/js/datatables.bootstrap.js') }}"></script>
<script>
    //Datatable
    $(document).ready(function () {
        $('#categories-table').DataTable();
    });

</script>
@endpush
