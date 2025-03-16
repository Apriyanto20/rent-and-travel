<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rute Tranportasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-start justify-between gap-5">
                <div class="bg-white px-12 pt-5 pb-6 rounded-3xl border shadow-xl w-1/2">
                    <div class="flex items-center gap-3">
                        <div class="w-12"><img src="{{ url('/assets/img/form.png') }}" alt="" srcset="">
                        </div>
                        <div class="font-bold text-xl">Form Input Data Rute Transportasi</div>
                    </div>
                    <hr class="mb-4 mt-3 border-2 rounded-xl">
                    <div>
                        <form action="{{ route('transportationRoutes.store') }}" method="post"
                            id="routeTransportationForm">
                            @csrf
                            <div class="mb-5">
                                <div
                                    class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                    <i class="fi fi-rr-display-code flex"></i> <span>Kode Rute Transportasi <span
                                            class="text-red-500">*</span></span>
                                </div>
                                <input type="text" name="codeRoute" id="codeRoute"
                                    class="w-full border border-gray-300 rounded-3xl px-4"
                                    placeholder="Kode Transportasi ....." value="{{ $codeTransportationRoute }}"
                                    readonly>
                                <p id="error-codeRoute" class="mt-2 text-sm text-red-500 hidden">Kode wajib
                                    diisi.</p>
                            </div>
                            <div class="mb-5">
                                <div
                                    class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                    <i class="fi fi-rr-route flex"></i> <span>Rute Awal<span
                                            class="text-red-500">*</span></span>
                                </div>
                                <input type="text" name="routeFirst" id="routeFirst"
                                    class="w-full border border-gray-300 rounded-3xl px-4" placeholder="Rute Awal ....."
                                    oninput="this.value = this.value.toUpperCase();">
                                <p id="error-routeFirst" class="mt-2 text-sm text-red-500 hidden">Rute Awal wajib
                                    diisi.</p>
                            </div>
                            <div class="mb-5">
                                <div
                                    class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                    <i class="fi fi-rr-route flex"></i> <span>Rute Tujuan<span
                                            class="text-red-500">*</span></span>
                                </div>
                                <input type="text" name="routeSecond" id="routeSecond"
                                    class="w-full border border-gray-300 rounded-3xl px-4"
                                    placeholder="Rute Tujuan ....." oninput="this.value = this.value.toUpperCase();">
                                <p id="error-routeSecond" class="mt-2 text-sm text-red-500 hidden">Rute Tujuan wajib
                                    diisi.</p>
                            </div>
                            <div class="mb-5">
                                <div
                                    class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                    <i class="fi fi-rr-brand flex"></i> <span>Harga<span
                                            class="text-red-500">*</span></span>
                                </div>
                                <div class="flex gap-2">
                                    <div><input type="text"
                                            class="w-14 border border-gray-300 rounded-3xl px-4 bg-gray-200" disabled
                                            value="Rp"></div>
                                    <div class="w-full">
                                        <input type="text" id="formatted_prices" data-target="price"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Harga ....." oninput="formatRupiah(this)">
                                        <input type="hidden" name="price" id="price">
                                    </div>
                                </div>
                                <p id="error-price" class="mt-2 text-sm text-red-500 hidden">Harga wajib
                                    diisi.</p>
                            </div>
                            <div class="flex">
                                <button
                                    class="flex border border-sky-500 px-4 pt-2 pb-2 rounded-full text-sky-500 hover:bg-sky-100"
                                    type="submit"><i class="fi fi-rr-disk flex mr-2 mt-1"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="bg-white px-12 pt-5 pb-6 rounded-3xl border shadow-xl w-full">
                    <div class="flex items-center gap-3">
                        <div class="w-12"><img src="{{ url('/assets/img/data.png') }}" alt="" srcset="">
                        </div>
                        <div class="font-bold text-xl">Data Rute Transportasi</div>
                    </div>
                    <hr class="mb-4 mt-3 border-2 rounded-xl">
                    <div class="flex justify-center">
                        <div class="p-0 " style="width:100%;overflow-x:auto;">
                            <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                                <div class="md:mt-0 sm:flex sm:space-x-4 w-full">
                                    <!-- Form untuk entries -->
                                    <x-show-entries :route="route('transportationRoutes.index')" :search="request()->search">
                                    </x-show-entries>
                                </div>

                                <div class="sm:ml-16 sm:mt-0 sm:flex sm:space-x-4 sm:flex-none">
                                    <form action="{{ route('transportationRoutes.index') }}" method="GET"
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
                                                <th scope="col" class="px-3 py-2 text-center bg-gray-100">KODE RUTE
                                                    TRANSPORTASI</th>
                                                <th scope="col" class="px-3 py-2 text-center">RUTE</th>
                                                <th scope="col" class="px-3 py-2 text-center bg-gray-100">HARGA
                                                </th>
                                                <th scope="col" class="px-3 py-2 text-center ">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = $transportationRoutes->firstItem();
                                            @endphp
                                            @forelse($transportationRoutes as $i)
                                                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="px-3 py-2 text-center">{{ $no++ }}</td>
                                                    <td class="px-3 py-2 text-center bg-gray-100">
                                                        {{ $i->codeRoute }}
                                                    </td>
                                                    <td class="px-3 py-2 text-center">{{ $i->route }}</td>
                                                    <td class="px-3 py-2 text-center bg-gray-100">Rp
                                                        {{ number_format($i->route_price, 0, ',', '.') }}</td>
                                                    <td class="px-3 py-2 text-center">
                                                        <button type="button" data-id="{{ $i->id }}"
                                                            data-modal-target="sourceModal"
                                                            data-code="{{ $i->codeRoute }}"
                                                            data-route="{{ $i->route }}"
                                                            data-price="{{ $i->route_price }}"
                                                            onclick="editSourceModal(this)"
                                                            class="border border-amber-500 text-amber-500 hover:bg-amber-100 px-3 pt-1 rounded-xl h-10 w-10 text-md"><i
                                                                class="fi fi-rr-file-edit"></i></button>
                                                        <button
                                                            onclick="return dataDelete('{{ $i->id }}','{{ $i->route }}')"
                                                            class="border border-red-500 text-red-500 hover:bg-red-100 px-3 pt-1 rounded-xl h-10 w-10 text-md"><i
                                                                class="fi fi-rr-trash"></i></button>
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
                                @if ($transportationRoutes->hasPages())
                                    {{ $transportationRoutes->appends(request()->query())->links('vendor.pagination.custom') }}
                                @else
                                    <div class="flex items-center justify-between">
                                        <nav class="flex justify-start">
                                            <div class="text-sm flex gap-1">
                                                <div>Showing</div>
                                                <div class="font-bold">1</div>
                                                <div>to</div>
                                                <div class="font-bold">{{ count($transportationRoutes) }}</div>
                                                <div>of</div>
                                                <div class="font-bold">{{ count($transportationRoutes) }}</div>
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
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/4 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Tambah Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col p-4 space-y-2"> <!-- Jarak antar input dikurangi -->
                        <div>
                            <label for="codeRoute"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Kode Rute
                                Transportasi</label>
                            <input id="codeRoutes" name="codeRoute"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Kode Rute Transportasi ..." required readonly>
                        </div>
                        <div>
                            <label for="routes"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Rute
                                Transportasi</label>
                            <input id="routes" name="routes"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Rute Awal ..." oninput="this.value = this.value.toUpperCase();" required>
                            </input>
                        </div>
                        <div>
                            <label for="route_price"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                            <div class="flex gap-2">
                                <div class="w-16">
                                    <input type="text" value="Rp"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        disabled>
                                </div>
                                <div class="w-full">
                                    <input type="text" id="formatted_pricess" data-target="route_price"
                                        class="w-full border border-gray-300 rounded-3xl px-4"
                                        placeholder="Harga ....." oninput="formatRupiah(this)">
                                    <input type="hidden" name="route_price" id="route_price">
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                            <button type="submit" id="formSourceButton"
                                class="bg-green-400 w-full h-10 rounded-xl hover:bg-green-500 text-white font-medium">Simpan</button>
                            <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                                class="bg-red-500 w-full h-10 rounded-xl text-white hover:bg-red-600">Batal</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('routeTransportationForm');

        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah form dikirim

            let isValid = true;

            const codeRoute = document.getElementById('codeRoute');
            const errorCodeRoute = document.getElementById('error-codeRoute');
            if (codeRoute.value === '') {
                errorCodeRoute.classList.remove('hidden');
                isValid = false;
            } else {
                errorCodeRoute.classList.add('hidden');
            }

            const routeFirst = document.getElementById('routeFirst');
            const errorRouteFirst = document.getElementById('error-routeFirst');
            if (routeFirst.value === '') {
                errorRouteFirst.classList.remove('hidden');
                isValid = false;
            } else {
                errorRouteFirst.classList.add('hidden');
            }

            const routeSecond = document.getElementById('routeSecond');
            const errorRouteSecond = document.getElementById('error-routeSecond');
            if (routeSecond.value === '') {
                errorRouteSecond.classList.remove('hidden');
                isValid = false;
            } else {
                errorRouteSecond.classList.add('hidden');
            }

            const price = document.getElementById('price');
            const errorPrice = document.getElementById('error-price');
            if (price.value === '') {
                errorPrice.classList.remove('hidden');
                isValid = false;
            } else {
                errorPrice.classList.add('hidden');
            }

            if (isValid) {
                form.submit();
            }
        });
    </script>
    <script>
        function formatRupiah(el) {
            let value = el.value.replace(/\D/g, "");
            el.value = new Intl.NumberFormat("id-ID").format(value);

            let hiddenInputId = el.dataset.target;
            document.getElementById(hiddenInputId).value = value;
        }
    </script>
    <script>
        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const codeRoutes = button.dataset.code;
            const route = button.dataset.route;
            const price = button.dataset.price;
            let url = "{{ route('transportationRoutes.update', ':id') }}".replace(':id', id);
            console.log(price);


            document.getElementById('title_source').innerText = `${route}`;
            document.getElementById('codeRoutes').value = codeRoutes;
            document.getElementById('routes').value = route;
            document.getElementById('route_price').value = price;
            document.getElementById('formatted_pricess').value = price;

            document.getElementById('formSourceButton').innerText = 'Simpan';
            document.getElementById('formSourceModal').setAttribute('action', url);

            let csrfToken = document.createElement('input');
            csrfToken.setAttribute('type', 'hidden');
            csrfToken.setAttribute('value', '{{ csrf_token() }}');
            formModal.appendChild(csrfToken);

            let methodInput = document.createElement('input');
            methodInput.setAttribute('type', 'hidden');
            methodInput.setAttribute('name', '_method');
            methodInput.setAttribute('value', 'PATCH');
            formModal.appendChild(methodInput);

            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }

        const sourceModalClose = (button) => {
            const modalTarget = button.dataset.modalTarget;
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }

        const dataDelete = async (id, pukul) => {
            Swal.fire({
                title: `Apakah Anda yakin?`,
                text: `Data akan dihapus secara permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    await axios.post(`/transportationRoutes/${id}`, {
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
