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

    <div x-data="{ openModel: false }" class="overflow-x-auto">
        <div class="inline-block min-w-full overflow-hidden align-middle">
            <table class="min-w-full text-sm text-gray-500 lg:text-base" id="cars-table" cellspacing="0">
                <thead>
                    <tr class="h-12">
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">#</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{__('car.Image')}}</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{__('car.Store')}}</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{__('car.Category')}}</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{__('car.Name')}}</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{__('car.Description')}}</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{__('car.Price')}}</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{__('car.Brand')}}</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{__('car.Model')}}</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{__('car.Color')}}</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{__('car.Type')}}</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{__('car.Age')}}</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{__('car.Kilometer')}}</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{__('car.Status')}}</th>
                        <th class="px-6 py-4 text-center"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cars as $car)
                    <tr class="text-gray-700">
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$car->id}}
                        </td>
                        <td class="{{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            <img class="object-cover w-20 h-20 overflow-hidden rounded-full shadow"
                                src="{{$car->image}}" alt="Your car">
                        </td>
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$car->store->name}}
                        </td>
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$car->category->name}}
                        </td>
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$car->name}}
                        </td>
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$car->description}}
                        </td>
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$car->price}}
                        </td>
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$car->brand}}
                        </td>
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$car->model}}
                        </td>
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$car->color}}
                        </td>
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$car->type}}
                        </td>
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$car->age}}
                        </td>
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$car->kilometer}}
                        </td>

                        <td>
                            <a href="{{route('cars.change_status', $car->id)}}"
                                class="text-center px-2 py-0.5 mx-2 text-sm
                                {{$car->status == config('constants.status.active') ? 'text-red-600 hover:bg-red-200 bg-red-100' : 'text-green-600 hover:bg-green-200 bg-green-100' }} rounded-full">
                                @if ($car->status == config('constants.status.active'))
                                {{__('car.Inactive')}}
                                @else
                                {{__('car.Active')}}
                                @endif
                            </a>
                        </td>

                        <td class="flex flex-row -mx-2 text-center">


                              <a href="{{route('cars.show', $car->id)}}"
                                class="p-2 mx-2 text-white bg-gray-500 rounded-md hover:bg-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                            </a>
                            <a href="{{route('cars.edit', $car->id)}}"
                                class="p-2 mx-2 text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
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

                            <button @click="openModel = true"
                                class="p-2 mx-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>


                            <div x-show="openModel" class="fixed inset-0 z-30 overflow-y-auto"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">

                                <div
                                    class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                    <div x-show="openModel"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-500 transform"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        @click="openModel = false"
                                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
                                        aria-hidden="true" style="display: none;"></div>

                                    <!-- This element is to trick the browser into centering the modal contents. -->

                                    <div x-show="openModel"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="transition ease-in duration-500 transform"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        class="inline-block overflow-hidden {{app()->getLocale() == 'en' ? 'text-right' : 'text-left' }} align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                                        style="display: none;">
                                        <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                            <div class="sm:flex">
                                                <div
                                                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                                    <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                                        </path>
                                                    </svg>
                                                </div>

                                                <div class="mt-3 text-center sm:mt-0 sm:mx-4 {{app()->getLocale() == 'en' ? 'sm:text-left' : 'sm:text-right' }} ">
                                                    <h3 class="text-lg font-medium leading-6 text-gray-900"
                                                        id="modal-title">
                                                        {{__('car.Delete Car')}}
                                                    </h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500">
                                                            {{__('car.Are you sure you want to delete the car')}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="{{route('cars.destroy', $car->id)}}" method="post">
                                            @csrf {{ method_field('DELETE') }}
                                            <div
                                                class="px-4 py-3 sm:-mx-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                                <button type="submit"
                                                    class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mx-3 sm:w-auto sm:text-sm">
                                                    {{__('car.Delete')}}
                                                </button>
                                                <button @click="openModel = false" type="button"
                                                    class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none sm:mt-0 sm:mx-3 sm:w-auto sm:text-sm">
                                                    {{__('car.Cancel')}}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

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
