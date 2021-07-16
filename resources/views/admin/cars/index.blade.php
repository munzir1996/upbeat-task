@extends('admin.layouts.app')

@push('css')
<link rel="stylesheet" href="{{asset('vendor/css/datatables.min.css')}}">
@endpush

@section('body')

<div class="p-6 bg-white border rounded-lg">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-primary">{{__('car.Car')}}</h1>
        </div>

        <a href="{{route('cars.create')}}"
            class="px-4 py-2 text-white rounded-md bg-green-800 hover:bg-green-700 focus:bg-green-700 focus:outline-none">
            {{__('car.Add Car')}}
        </a>

    </div>

    <div class="overflow-x-auto">
        <div class="inline-block min-w-full overflow-hidden align-middle">
            <table class="min-w-full text-sm text-gray-500 lg:text-base" id="cars-table" cellspacing="0">
                <thead>
                    <tr class="h-12">
                        <th class="px-6 py-4 text-left">#</th>
                        <th class="px-6 py-4 text-left">{{__('car.Image')}}</th>
                        <th class="px-6 py-4 text-left">{{__('car.Store')}}</th>
                        <th class="px-6 py-4 text-left">{{__('car.Category')}}</th>
                        <th class="px-6 py-4 text-left">{{__('car.Name')}}</th>
                        <th class="px-6 py-4 text-left">{{__('car.Description')}}</th>
                        <th class="px-6 py-4 text-left">{{__('car.Price')}}</th>
                        <th class="px-6 py-4 text-left">{{__('car.Brand')}}</th>
                        <th class="px-6 py-4 text-left">{{__('car.Model')}}</th>
                        <th class="px-6 py-4 text-left">{{__('car.Color')}}</th>
                        <th class="px-6 py-4 text-left">{{__('car.Type')}}</th>
                        <th class="px-6 py-4 text-left">{{__('car.Age')}}</th>
                        <th class="px-6 py-4 text-left">{{__('car.Kilometer')}}</th>
                        <th class="px-6 py-4 text-left">{{__('car.Status')}}</th>
                        <th class="px-6 py-4 text-center"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cars as $car)
                    <tr class="text-gray-700">
                        <td class="px-6 py-4 text-left">
                            {{$car->id}}
                        </td>
                        <td class="text-left">
                            <img class="object-cover w-20 h-20 overflow-hidden rounded-full shadow" src="{{$car->image}}" alt="Your car">
                        </td>
                        <td class="px-6 py-4 text-left">
                            {{$car->store->name}}
                        </td>
                        <td class="px-6 py-4 text-left">
                            {{$car->category->name}}
                        </td>
                        <td class="px-6 py-4 text-left">
                            {{$car->name}}
                        </td>
                        <td class="px-6 py-4 text-left">
                            {{$car->description}}
                        </td>
                        <td class="px-6 py-4 text-left">
                            {{$car->price}}
                        </td>
                        <td class="px-6 py-4 text-left">
                            {{$car->brand}}
                        </td>
                        <td class="px-6 py-4 text-left">
                            {{$car->model}}
                        </td>
                        <td class="px-6 py-4 text-left">
                            {{$car->color}}
                        </td>
                        <td class="px-6 py-4 text-left">
                            {{$car->type}}
                        </td>
                        <td class="px-6 py-4 text-left">
                            {{$car->age}}
                        </td>
                        <td class="px-6 py-4 text-left">
                            {{$car->kilometer}}
                        </td>

                        <td>
                            <a href="{{route('cars.change_status', $car->id)}}" class="text-center px-2 py-0.5 mx-2 text-sm
                                {{$car->status == config('constants.status.active') ? 'text-red-600 hover:bg-red-200 bg-red-100' : 'text-green-600 hover:bg-green-200 bg-green-100' }} rounded-full">
                                @if ($car->status == config('constants.status.active'))
                                {{__('car.Inactive')}}
                                @else
                                {{__('car.Active')}}
                                @endif
                            </a>
                        </td>

                        <td class="flex flex-row -mx-2 text-center">

                            <a href="{{route('cars.edit', $car->id)}}" class="p-2 mx-2 text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
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
                            <form action="{{route('cars.destroy', $car->id)}}" method="post">
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
    // $(document).ready(function () {
    //     $('#cars-table').DataTable();
    // });

</script>
@endpush
