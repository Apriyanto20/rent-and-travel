<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-start justify-between gap-5">
                <div class="bg-white px-12 pt-5 pb-6 rounded-3xl border shadow-xl w-full">
                    <div class="flex items-center gap-3 justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-12"><img src="{{ url('/assets/img/data.png') }}" alt=""
                                    srcset="">
                            </div>
                            <div class="font-bold text-xl">Report Rental</div>
                        </div>
                        <div class="flex gap-4 mb-2">
                            @if ($hasFilter)
                                <div class="mt-4">
                                    <a href="{{ route('reportRental.create', [
                                        'paymentStatus' => request('paymentStatus') ?? '',
                                        'rentalStatus' => request('rentalStatus') ?? '',
                                        'rentalStartDate' => request('rentalStartDate') ?? '',
                                        'rentalEndDate' => request('rentalEndDate') ?? '',
                                    ]) }}"
                                        class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-red-100 border border-dashed border-red-500 text-red-500 pl-4 pr-4 pt-2"><i
                                            class="fi fi-sr-file-pdf mr-2 text-lg"></i> <span>Export PDF</span></a>
                                </div>
                                <div class="mt-4">
                                    <a href="{{ route('reportRental.export.excel', [
                                        'paymentStatus' => request('paymentStatus'),
                                        'rentalStatus' => request('rentalStatus'),
                                    ]) }}"
                                        class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-emerald-100 border border-dashed border-emerald-500 text-emerald-500 pl-4 pr-4 pt-2"><i
                                            class="fi fi-sr-file-excel mr-2 text-lg"></i> <span>Export Excel</span></a>
                                </div>
                            @endif
                            <div class="mt-4">
                                <a href="#" onclick="return filter()"
                                    class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-sky-100 border border-dashed border-sky-500 text-sky-500 pl-4 pr-4 pt-2"><i
                                        class="fi fi-sr-filter mr-2 text-lg"></i> <span>Filter
                                        Report</span></a>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4 mt-3 border-2 rounded-xl">
                    <div class="flex justify-center">
                        <div class="p-0 " style="width:100%;overflow-x:auto;">
                            <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                                <div class="md:mt-0 sm:flex sm:space-x-4 w-full">
                                    <!-- Form untuk entries -->
                                    <x-show-entries :route="route('reportRental.index')" :search="request()->search">
                                    </x-show-entries>
                                </div>

                                <div class="sm:ml-16 sm:mt-0 sm:flex sm:space-x-4 sm:flex-none">
                                    <form action="{{ route('reportRental.index') }}" method="GET"
                                        class="flex items-center flex-1">
                                        <input type="text" name="search" placeholder="Enter for search . . . "
                                            id="search" value="{{ request('search') }}"
                                            class="w-56 relative inline-flex items-center px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300"
                                            oninput="this.value = this.value.toUpperCase();" />

                                        <input type="hidden" name="entries" value="{{ request('entries', 10) }}">
                                        <input type="hidden" name="page" value="{{ request('page', 1) }}">
                                    </form>
                                </div>
                            </div>
                            <div class="relative overflow-x-auto rounded-lg shadow-lg">
                                <div class="overflow-x-auto">
                                    <table class="table-auto w-full text-sm text-left text-gray-500 border">
                                        <thead class="text-md font-bold text-gray-700 uppercase">
                                            <tr>
                                                <th scope="col" class="px-3 py-2 text-center">NO</th>
                                                <th scope="col" class="px-3 py-2 text-center bg-gray-100">WAKTU
                                                    TRANSAKSI</th>
                                                <th scope="col" class="px-3 py-2 text-center bg-gray-100">MEMBER KODE
                                                </th>
                                                <th scope="col" class="px-3 py-2 text-center bg-gray-100">MEMBER</th>
                                                <th scope="col" class="px-3 py-2 text-center">TRANSPORTASI</th>
                                                <th scope="col" class="px-3 py-2 text-center bg-gray-100">MERK</th>
                                                <th scope="col" class="px-3 py-2 text-center">MODEL</th>
                                                <th scope="col" class="px-3 py-2 text-center bg-gray-100">WAKTU
                                                    RENTAL</th>
                                                <th scope="col" class="px-3 py-2 text-center bg-gray-100">METODE
                                                    PEMBAYARAN</th>
                                                <th scope="col" class="px-3 py-2 text-center bg-gray-100">STATUS
                                                    PEMBAYARAN</th>
                                                <th scope="col" class="px-3 py-2 text-center bg-gray-100">STATUS
                                                    RENTAL</th>
                                                <th scope="col" class="px-3 py-2 text-center bg-gray-100">TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = $transactionsRental->firstItem();
                                            @endphp
                                            @forelse($transactionsRental as $i)
                                                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700"
                                                    data-expired-at="{{ \Carbon\Carbon::parse($i->created_at)->addMinutes(15) }}"
                                                    data-proof="{{ $i->proofOfPayment }}">
                                                    <td class="px-3 py-2 text-center">{{ $no++ }}</td>
                                                    <td class="px-3 py-2 text-center">{{ $i->created_at }}</td>
                                                    <td class="px-3 py-2 text-center bg-gray-100">
                                                        {{ $i->member->nik }}
                                                    </td>
                                                    <td class="px-3 py-2 text-center bg-gray-100">
                                                        {{ $i->member->name }}
                                                    </td>
                                                    <td class="px-3 py-2 text-center">
                                                        {{ $i->transportationRental->transportation->transportation }}
                                                    </td>
                                                    <td class="px-3 py-2 text-center bg-gray-100">
                                                        {{ $i->transportationRental->merk->merk }}</td>
                                                    <td class="px-3 py-2 text-center">
                                                        {{ $i->transportationRental->model }}</td>
                                                    <td class="px-3 py-2 text-center">
                                                        {{ date('d-m-Y', strtotime($i->rentalStartDate)) }} <span
                                                            class="font-bold text-red-500">s/d</span>
                                                        {{ date('d-m-Y', strtotime($i->rentalEndDate)) }}</td>
                                                    <td class="px-3 py-2 text-center">
                                                        {{ $i->paymentMethod }}</td>
                                                    <td class="px-3 py-2 text-center">
                                                        {{ $i->paymentStatus }}</td>
                                                    <td class="px-3 py-2 text-center">
                                                        {{ $i->rentalStatus }}</td>
                                                    <td class="px-3 py-2 text-center">
                                                        {{ $i->rentalCost }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4"
                                                        class="px-3 py-2 text-center bg-gray-500 text-white">
                                                        Data Belum Tersedia!
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mt-4">
                                @if ($transactionsRental->hasPages())
                                    {{ $transactionsRental->appends(request()->query())->links('vendor.pagination.custom') }}
                                @else
                                    <div class="flex items-center justify-between">
                                        <nav class="flex justify-start">
                                            <div class="text-sm flex gap-1">
                                                <div>Showing</div>
                                                <div class="font-bold">1</div>
                                                <div>to</div>
                                                <div class="font-bold">{{ count($transactionsRental) }}</div>
                                                <div>of</div>
                                                <div class="font-bold">{{ count($transactionsRental) }}</div>
                                                <div>entries</div>
                                            </div>
                                        </nav>
                                        <div class="flex items-center space-x-2">
                                            <div class="flex">
                                                <div class="border px-4 py-1 rounded-l-lg">&lt;</div>
                                                <div class="border px-4 py-1">1</div>
                                                <div class="border px-4 py-1 rounded-r-lg">&gt;</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-filter" class="hidden fixed inset-0 flex justify-center items-center z-50">
        <!-- Backdrop Blur -->
        <div class="absolute inset-0 bg-black opacity-50 backdrop-blur-sm"></div>
        <div class="bg-white rounded-lg p-6 lg:w-4/12 w-full shadow-xl z-10">
            <h2 class="text-lg font-bold mb-4 bg-amber-50 pl-6 pr-6 p-2 rounded-xl">Filter Report</h2>
            <form id="filterForm" action="{{ route('reportRental.index') }}" method="get" class="w-full">

                <p id="modal-content"></p>
                <hr class="mt-4 border-2">
                <button type="submit" id="submitFilter" class="mt-4 bg-sky-500 text-white px-4 py-2 rounded">
                    Submit
                </button>
                <button onclick="closeModalFilter(event)" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
                    Tutup
                </button>
            </form>
        </div>
    </div>
    <script>
        function filter() {
            const modalContent = document.getElementById("modal-content");
            modalContent.innerHTML = `
                <div class="flex flex-col w-full gap-4">
                    <select class="js-example-placeholder-single js-states form-control w-full mb-4" id="paymentStatus" name="paymentStatus" data-placeholder="Pilih Status Pembayaran">
                        <option value="">Pilih...</option>
                        <option value="SUCCESS">SUCCESS</option>
                        <option value="WAITING FOR PAYMENT">WAITING FOR PAYMENT</option>
                        <option value="CANCEL">CANCEL</option>
                    </select>
                    <select class="js-example-placeholder-single js-states form-control w-full" id="rentalStatus" name="rentalStatus" data-placeholder="Pilih Status Rental">
                        <option value="">Pilih...</option>
                        <option value="SUCCESS">SUCCESS</option>
                        <option value="WAITING FOR PAYMENT">WAITING FOR PAYMENT</option>
                        <option value="CANCEL">CANCEL</option>
                        <option value="RENTAL">RENTAL</option>
                    </select>
                    <div class="flex gap-2 items-center">
                        <div class=" border border-gray-300 rounded-3xl px-4 py-[9px] text-gray-400 w-24">
                            Dari
                        </div>
                        <div class="w-full">
                            <input type="date" id="rentalStartDate" name="rentalStartDate" class="w-full border border-gray-300 rounded-3xl px-4 text-gray-400">
                        </div>
                    </div>
                    <div class="flex gap-2 items-center">
                        <div class="border border-gray-300 rounded-3xl px-4 py-[9px] text-gray-400 w-24">
                            Sampai
                        </div>
                        <div class="w-full">
                            <input type="date" id="rentalEndDate" name="rentalEndDate" class="w-full border border-gray-300 rounded-3xl px-4 text-gray-400">
                        </div>
                    </div>
                </div>
            `;
            initializeSelect2();
            const modal = document.getElementById("modal-filter");
            modal.classList.remove("hidden");
        }

        const initializeSelect2 = () => {
            $('.js-example-placeholder-single').select2({
                placeholder: "Pilih...",
                allowClear: true,
            });
        };

        function closeModalFilter(event) {
            event.preventDefault(); // Mencegah form submit
            const modal = document.getElementById("modal-filter");
            modal.classList.add("hidden");
        }
    </script>
</x-app-layout>
