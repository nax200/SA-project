@extends('layouts.main')
@section('content')
    <section class="mx-8">
        <h1 class="text-3xl mx-4 mt-6">
            คลังเก็บอุปกรณ์
        </h1>
        <div class="mx-8 mt-3 mb-3">
            <button type="button"
                    class="bg-[#7FB07E] hover:bg-[##38761d] text-white font-bold py-2 px-4 rounded"
                    onclick="window.location='{{ route('tools.create')  }}'">
                + ลงทะเบียนอุปกรณ์
            </button>
        </div>

        <table class="w-full table-auto text-left text-gray-600 dark:text-gray-400">
            <thead class="text-lg text-gray-700 bg-gray-200 dark:bg-gray-700 dark:text-gray-400 w-full">
            <tr>
                <th scope="col" class="py-3 px-6 text-center">รหัสอุปกรณ์</th>
                <th scope="col" class="py-3 px-6">ชื่ออุปกรณ์</th>
                <th scope="col" class="py-3 px-6">จำนวน</th>
                <th scope="col" class="py-3 px-6">ประเภท</th>
                <th scope="col" class="py-3 px-6"> ACTION </th>
            </tr>
            </thead>
            <tbody class="m-2">
            @foreach($tools as $tool)
                <tr class="border-t">

                    <td class="py-3 px-6">
                        <p>
                            {{$tool->id}}
                        </p>
                    </td>


                    <td class="pr-3">
                        <p>
                            {{ $tool->name }}
                        </p>
                    </td>
                    <td class="py-3 px-6">
                        <span id="totalClick">{{$tool->quantity}}</span>
                    </td>
                    <td class="p-3">
                        <p class="p-3">
                            {{$tool->type}}
                        </p>
                    </td>
                        <td class="p-3">
                        <a href="{{ route('tools.show', ['tool' => $tool]) }}" class="text-center mx-3">
                            <button class="app-button mt-4" type="submit">แก้ไขอุปกรณ์</button>
                        </a>
                            <a href="{{ route('tools.update.quantity',['tool' => $tool])  }}" class="text-center">
                                <button class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900 mt-4" type="submit">อัพเดทจำนวนอุปกรณ์</button>
                            </a>
                        </td>
                    </td>
            @endforeach
            </tbody>
        </table>
    </section>
    <script type="text/javascript">
        function totalClick(click) {
            const totalClick = document.getElementById('totalClick');
            const sumValue = parseInt(totalClick.innerText) + click;
            console.log(sumValue + click);
            totalClick.innerText = sumValue;

            if (sumValue < 0) {
                totalClick.innerText = 0;
            }
        }
    </script>
@endsection
