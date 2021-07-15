@extends('admin.layouts.app')

@section('body')
<div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    <div class="p-5 bg-white rounded-md shadow">
        <div class="text-base font-semibold text-gray-400">مبيعات اليوم</div>
        <div class="flex items-center pt-1">
            <div class="text-2xl font-bold text-gray-900 ">149</div>
            <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-green-600 bg-green-100 rounded-full">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <span>1.8%</span>
            </span>
        </div>
    </div>
    <div class="p-5 bg-white rounded-md shadow">
        <div class="text-base font-semibold text-gray-400">مبيعات الاسبوع</div>
        <div class="flex items-center pt-1">
            <div class="text-2xl font-bold text-gray-900 ">1265</div>
            <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-red-600 bg-red-100 rounded-full">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <span>2.5%</span>
            </span>
        </div>
    </div>
    <div class="p-5 bg-white rounded-md shadow">
        <div class="text-base font-semibold text-gray-400">مبيعات الشهر</div>
        <div class="flex items-center pt-1">
            <div class="text-2xl font-bold text-gray-900 ">7586</div>
            <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-green-600 bg-green-100 rounded-full">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <span>5.2%</span>
            </span>
        </div>
    </div>
    <div class="p-5 bg-white rounded-md shadow">
        <div class="text-base font-semibold text-gray-400">مبيعات السنة</div>
        <div class="flex items-center pt-1">
            <div class="text-2xl font-bold text-gray-900 ">200,639</div>
            <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-green-600 bg-green-100 rounded-full">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <span>2.2%</span>
            </span>
        </div>
    </div>
</div>

<div class="w-full mt-6">
    <div class="p-6 bg-white rounded-lg shadow lg:flex ">
        <div class="lg:w-8/12">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="font-bold text-primary">ملخص الطلبات</h1>
                </div>

                <a href="#" class="px-4 py-2 text-gray-500 bg-white border rounded-md bg-opacity-40 hover:bg-gray-100">هذا الشهر </a>
            </div>

            <div id="SummaryChart"></div>
        </div>

        <div class="lg:w-1/3">
            <div class="p-5 border-b border-gray-200">
                <h2 class="mb-6 text-lg font-bold text-primary">آخر العمليات</h2>

                <div class="flex flex-row justify-between mb-3">
                    <div class="">
                        <h4 class="mb-1 text-lg text-primary">افطار</h4>
                        <p class="text-gray-700 ">
                            منذ أسبوعين و 0 يوم</p>
                    </div>
                    <div class="font-medium text-gray-700">
                        <span class="text-primary">+</span> 9 ر.س
                    </div>
                </div>
                <div class="flex flex-row justify-between mb-3">
                    <div class="">
                        <h4 class="mb-1 text-lg text-primary">رمضان</h4>
                        <p class="text-gray-700 ">
                            منذ أسبوعين و 3 يوم</p>
                    </div>
                    <div class="font-medium text-gray-700">
                        <span class="text-primary">+</span> 500 ر.س
                    </div>
                </div>
                <div class="flex flex-row justify-between mb-3">
                    <div class="">
                        <h4 class="mb-1 text-lg text-primary">افطار</h4>
                        <p class="text-gray-700 ">
                            منذ شهر و 3 أسبوع</p>
                    </div>
                    <div class="font-medium text-gray-700">
                        <span class="text-primary">+</span> 9 ر.س
                    </div>
                </div>
                <div class="flex flex-row justify-between">
                    <div class="">
                        <h4 class="mb-1 text-lg text-primary">افطار</h4>
                        <p class="text-gray-700 ">
                            منذ شهرين و 2 أسبوع</p>
                    </div>
                    <div class="font-medium text-gray-700">
                        <span class="text-primary">+</span> 9 ر.س
                    </div>
                </div>
            </div>

            <div class="px-5 mt-2">
                <h2 class="mb-2 text-lg font-bold text-primary">هدف الشهر</h2>
                <strong class="text-xl font-extrabold text-gray-700">150,000 ر.س</strong>

                <div class="relative h-2 mt-2 bg-gray-300 rounded-full">
                    <div class="w-2/3 h-full rounded-full shadow-md bg-primary"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flex flex-wrap mt-8 lg:-mx-4">
    <div class="w-full lg:w-1/2 lg:px-4">
        <div class="p-6 bg-white rounded-lg shadow ">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="font-bold text-primary">الاعلي مبيعا</h1>
                </div>

                <a href="#" class="px-4 py-2 text-gray-500 bg-white border rounded-md bg-opacity-40 hover:bg-gray-100">عرض الكل </a>
            </div>

            <div class="overflow-x-auto">
                <div class="inline-block min-w-full overflow-hidden align-middle">
                    <table class="min-w-full text-sm text-gray-500 lg:text-base" cellspacing="0">
                        <thead>
                            <tr class="h-12">
                                <th class="px-6 py-4 text-right">المنتج</th>
                                <th class="px-6 py-4 text-right">السعر</th>
                                <th class="px-6 py-4 text-right">عدد المباح</th>
                                <th class="px-6 py-4 text-right">الربح</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="font-bold text-primary">
                                <td class="px-6 py-4 text-right">
                                    حذا رياضي
                                </td>

                                <td class="px-6 py-4 text-right">
                                    200ر.س
                                </td>

                                <td class="px-6 py-4 text-right">
                                    1233 قطعة
                                </td>

                                <td class="px-6 py-4 text-right">
                                    25693 ر.س
                                </td>
                            </tr>

                            <tr class="font-bold text-primary">
                                <td class="px-6 py-4 text-right">
                                    حذا رياضي
                                </td>

                                <td class="px-6 py-4 text-right">
                                    200ر.س
                                </td>

                                <td class="px-6 py-4 text-right">
                                    1233 قطعة
                                </td>

                                <td class="px-6 py-4 text-right">
                                    25693 ر.س
                                </td>
                            </tr>

                            <tr class="font-bold text-primary">
                                <td class="px-6 py-4 text-right">
                                    حذا رياضي
                                </td>

                                <td class="px-6 py-4 text-right">
                                    200ر.س
                                </td>

                                <td class="px-6 py-4 text-right">
                                    1233 قطعة
                                </td>

                                <td class="px-6 py-4 text-right">
                                    25693 ر.س
                                </td>
                            </tr>

                            <tr class="font-bold text-primary">
                                <td class="px-6 py-4 text-right">
                                    حذا رياضي
                                </td>

                                <td class="px-6 py-4 text-right">
                                    200ر.س
                                </td>

                                <td class="px-6 py-4 text-right">
                                    1233 قطعة
                                </td>

                                <td class="px-6 py-4 text-right">
                                    25693 ر.س
                                </td>
                            </tr>

                            <tr class="font-bold text-primary">
                                <td class="px-6 py-4 text-right">
                                    حذا رياضي
                                </td>

                                <td class="px-6 py-4 text-right">
                                    200ر.س
                                </td>

                                <td class="px-6 py-4 text-right">
                                    1233 قطعة
                                </td>

                                <td class="px-6 py-4 text-right">
                                    25693 ر.س
                                </td>
                            </tr>

                            <tr class="font-bold text-primary">
                                <td class="px-6 py-4 text-right">
                                    حذا رياضي
                                </td>

                                <td class="px-6 py-4 text-right">
                                    200ر.س
                                </td>

                                <td class="px-6 py-4 text-right">
                                    1233 قطعة
                                </td>

                                <td class="px-6 py-4 text-right">
                                    25693 ر.س
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full mt-6 lg:w-1/2 lg:mt-0 lg:px-4">
        <div class="p-6 bg-white rounded-lg shadow ">
            <h1 class="font-bold text-primary">آخر الطلبات</h1>

            <div class="overflow-x-auto">
                <div class="inline-block min-w-full overflow-hidden align-middle">
                    <table class="min-w-full text-sm text-gray-500 lg:text-base" cellspacing="0">
                        <thead>
                            <tr class="h-12">
                                <th class="px-6 py-4 text-right">العميل</th>
                                <th class="px-6 py-4 text-right">رقم الطلب</th>
                                <th class="px-6 py-4 text-right">السعر</th>
                                <th class="px-6 py-4 text-right">لحالة</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="font-bold text-primary">
                                <td class="px-6 py-4 text-right">
                                    احمد حسين
                                </td>

                                <td class="px-6 py-4 text-right">
                                    #1254
                                </td>

                                <td class="px-6 py-4 text-right">
                                    56ر.س
                                </td>

                                <td class="px-6 py-4 text-right">
                                    قيد الانتظار
                                </td>
                            </tr>

                            <tr class="font-bold text-primary">
                                <td class="px-6 py-4 text-right">
                                    احمد حسين
                                </td>

                                <td class="px-6 py-4 text-right">
                                    #1254
                                </td>

                                <td class="px-6 py-4 text-right">
                                    56ر.س
                                </td>

                                <td class="px-6 py-4 text-right">
                                    قيد الانتظار
                                </td>
                            </tr>

                            <tr class="font-bold text-primary">
                                <td class="px-6 py-4 text-right">
                                    احمد حسين
                                </td>

                                <td class="px-6 py-4 text-right">
                                    #1254
                                </td>

                                <td class="px-6 py-4 text-right">
                                    56ر.س
                                </td>

                                <td class="px-6 py-4 text-right">
                                    قيد الانتظار
                                </td>
                            </tr>

                            <tr class="font-bold text-primary">
                                <td class="px-6 py-4 text-right">
                                    احمد حسين
                                </td>

                                <td class="px-6 py-4 text-right">
                                    #1254
                                </td>

                                <td class="px-6 py-4 text-right">
                                    56ر.س
                                </td>

                                <td class="px-6 py-4 text-right">
                                    قيد الانتظار
                                </td>
                            </tr>

                            <tr class="font-bold text-primary">
                                <td class="px-6 py-4 text-right">
                                    احمد حسين
                                </td>

                                <td class="px-6 py-4 text-right">
                                    #1254
                                </td>

                                <td class="px-6 py-4 text-right">
                                    56ر.س
                                </td>

                                <td class="px-6 py-4 text-right">
                                    قيد الانتظار
                                </td>
                            </tr>

                            <tr class="font-bold text-primary">
                                <td class="px-6 py-4 text-right">
                                    احمد حسين
                                </td>

                                <td class="px-6 py-4 text-right">
                                    #1254
                                </td>

                                <td class="px-6 py-4 text-right">
                                    56ر.س
                                </td>

                                <td class="px-6 py-4 text-right">
                                    قيد الانتظار
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        var options = {
            chart: {
                //   height: 280,
                width: '100%',
                height: '340px',
                type: "area",
                toolbar: {
                    show: false,
                },
            },
            grid: {
                show: true,
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            series: [
                {
                    name: "اجمالي المبيعات",
                    data: [500, 9]
                }
            ],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.9,
                    opacityTo: 0.7,
                    stops: [0, 90, 100]
                },
                colors: ['#4fd1a5'],
            },
            stroke: {
                colors: ['#4fd1af'],
                width: 3
            },
            yaxis: {
                show: false,
            },
            xaxis: {
                categories: ['02-06', '05-06'],
                labels: {
                    show: true,
                },
                axisBorder: {
                    show: false,
                },
                tooltip: {
                    enabled: true,
                }
            },

        };


        var SummaryChart = document.getElementById("SummaryChart");

        if (SummaryChart != null && typeof (SummaryChart) != 'undefined') {
            var chart = new ApexCharts(document.querySelector("#SummaryChart"), options);
            chart.render();
        }
    </script>
@endpush
