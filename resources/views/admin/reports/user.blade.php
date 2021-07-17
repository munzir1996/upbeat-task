@extends('admin.layouts.app')

@push('css')
<link rel="stylesheet" href="{{asset('vendor/css/datatables.min.css')}}">
@endpush

@section('body')

<div class="p-6 bg-white border rounded-lg">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-primary">{{__('sidebar.Users')}}</h1>
        </div>

        <div class="flex gap-6 mt-6 ">
            <form action="{{route('filter.user')}}" class="flex" method="get">
            <div>
                <label class="text-gray-700">
                    {{__('user.From')}}
                </label>
                <input type="date" name="from"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                    @error('phone') border-red-500 @enderror">
                    @error('phone')
                        <span class="error text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div>
                <label class="text-gray-700">{{__('user.To')}}</label>
                <input type="date" name="to"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40
                    @error('password') border-red-500 @enderror"
                    required>
                    @error('password')
                        <span class="error text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="flex items-center mt-6">
                    <button type="submit"
                        class="px-4 py-2 mx-4 text-white rounded-md bg-green-800 hover:bg-green-700 focus:bg-green-700 focus:outline-none">
                        {{__('user.Filter')}}
                    </button>
                </div>
            </form>
        </div>

    </div>

    <div x-data="{ openModel: false }" class="overflow-x-auto">
        <div class="inline-block min-w-full overflow-hidden align-middle">
            <table class="min-w-full text-sm text-gray-500 lg:text-base" id="users-table" cellspacing="0">
                <thead>
                    <tr class="h-12">
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">#</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{__('user.Name')}}</th>
                        <th class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{__('user.Email')}}</th>
                        <th class="px-6 py-4 text-center">{{__('user.Date')}}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr class="text-gray-700">
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$user->id}}
                        </td>
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$user->name}}
                        </td>
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$user->email}}
                        </td>
                        <td class="px-6 py-4 {{app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                            {{$user->created_at}}
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
        $('#users-table').DataTable();
    });

</script>
@endpush
