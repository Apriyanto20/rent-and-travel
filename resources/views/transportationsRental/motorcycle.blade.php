<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Merk') }}
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
                            <div class="font-bold text-xl">Transportasi Rental</div>
                        </div>
                        <div class="flex items-center">
                            <a href="{{ route('transportationsRentalMotorcycle.create') }}"
                                class="border border-sky-500 text-sky-500 px-6 py-2 font-bold rounded-xl hover:bg-sky-100"><i
                                    class="fi fi-rr-add mr-1"></i> <span>Tambah Transportasi</span></a>
                        </div>
                    </div>
                    <hr class="mb-4 mt-3 border-2 rounded-xl">
                    <div class="flex justify-center">
                        <div class="p-0 " style="width:100%;overflow-x:auto;">
                            <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                                <div class="md:mt-0 sm:flex sm:space-x-4 w-full">
                                    <!-- Form untuk entries -->
                                    <x-show-entries :route="route('transportationsRentalMotorcycle.index')" :search="request()->search">
                                    </x-show-entries>
                                </div>

                                <div class="sm:ml-16 sm:mt-0 sm:flex sm:space-x-4 sm:flex-none">
                                    <form action="{{ route('transportationsRentalMotorcycle.index') }}" method="GET"
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
                                                <th scope="col" class="px-3 py-2 text-center bg-gray-100">PLAT NOMOR
                                                </th>
                                                <th scope="col" class="px-3 py-2 text-center">Merk</th>
                                                <th scope="col" class="px-3 py-2 text-center bg-gray-100">usia
                                                    kendaraan</th>
                                                <th scope="col" class="px-3 py-2 text-center">status kendaraan</th>
                                                <th scope="col" class="px-3 py-2 text-center bg-gray-100">lokasi</th>
                                                <th scope="col" class="px-3 py-2 text-center">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = $transportationDetailRental->firstItem();
                                            @endphp
                                            @forelse($transportationDetailRental as $i)
                                                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="px-3 py-2 text-center">{{ $no++ }}</td>
                                                    <td class="px-3 py-2 text-center bg-gray-100">
                                                        {{ $i->license_plate }}
                                                    </td>
                                                    <td class="px-3 py-2 text-center">{{ $i->merk }}</td>
                                                    <td class="px-3 py-2 text-center bg-gray-100">
                                                        {{ $i->production_year }}</td>
                                                    <td class="px-3 py-2 text-center">{{ $i->vehicle_statuses }}</td>
                                                    <td class="px-3 py-2 text-center bg-gray-100">{{ $i->location }}
                                                    </td>
                                                    <td class="px-3 py-2  text-center flex gap-2 justify-center">
                                                        <a href="{{ route('transportationsRentalMotorcycle.show', $i->codeDetailTransportation) }}"
                                                            class="border border-sky-500 text-sky-500 hover:bg-sky-100 flex items-center justify-center rounded-xl h-10 w-10 text-md">
                                                            <i class="fi fi-sr-eye mt-1"></i>
                                                        </a>
                                                        <a href="{{ route('transportationsRentalMotorcycle.edit', $i->codeDetailTransportation) }}"
                                                            class="border border-amber-500 text-amber-500 hover:bg-amber-100 flex items-center justify-center rounded-xl h-10 w-10 text-md">
                                                            <i class="fi fi-rr-file-edit mt-1"></i>
                                                        </a>
                                                        <button type="button" onclick="return dataDelete('{{ $i->id_motor }}')"
                                                            class="border border-red-500 text-red-500 hover:bg-red-100 px-3 pt-1 rounded-xl h-10 w-10 text-md">
                                                            <i class="fi fi-rr-trash"></i>
                                                        </button>
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
                                @if ($transportationDetailRental->hasPages())
                                    {{ $transportationDetailRental->appends(request()->query())->links('vendor.pagination.custom') }}
                                @else
                                    <div class="flex items-center justify-between">
                                        <nav class="flex justify-start">
                                            <div class="text-sm flex gap-1">
                                                <div>Showing</div>
                                                <div class="font-bold">1</div>
                                                <div>to</div>
                                                <div class="font-bold">{{ count($transportationDetailRental) }}</div>
                                                <div>of</div>
                                                <div class="font-bold">{{ count($transportationDetailRental) }}</div>
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
    <script>
        const dataDelete = async (id) => {
            Swal.fire({
                title: `Apakah Anda yakin?`,
                text: `Data akan dihapus secara permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: `Ya, hapus!`,
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    await axios.post(`/transportationsRentalMotorcycle/${id}`, {
                            '_method': 'DELETE',
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        })
                        .then(function(response) {
                            Swal.fire({
                                title: 'Terhapus!',
                                text: `Data berhasil dihapus.`,
                                icon: 'success',
                                confirmButtonText: 'OK',
                                allowOutsideClick: false
                            }).then(() => {
                                // Refresh halaman setelah menekan tombol OK
                                location.reload();
                            });
                        })
                        .catch(function(error) {
                            // Alert jika terjadi kesalahan
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat menghapus data.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                            console.log(error);
                        });
                }
            });
        };
    </script>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script>

        @if (session('message_insert'))
            <script>
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('message_insert') }}",
                    icon: 'success',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    didOpen: () => {
                        const swalBtn = Swal.getConfirmButton();
                        swalBtn.disabled = false;
                        swalBtn.textContent = "OK";
                    }
                });
            </script>
        @endif

        @if (session('message_update'))
            <script>
                Swal.fire({
                    title: 'Update Berhasil!',
                    text: "{{ session('message_update') }}",
                    icon: 'success',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    didOpen: () => {
                        const swalBtn = Swal.getConfirmButton();
                        swalBtn.disabled = false;
                        swalBtn.textContent = "OK";
                    }
                });
            </script>
        @endif

    @endpush
</x-app-layout>
