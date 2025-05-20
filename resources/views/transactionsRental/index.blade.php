<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaksi') }}
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
                        </div>
                    </div>
                    <hr class="mb-4 mt-3 border-2 rounded-xl">
                    <div class="flex justify-center">
                        <div class="p-0 " style="width:100%;overflow-x:auto;">
                            <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                                <div class="md:mt-0 sm:flex sm:space-x-4 w-full">
                                    <!-- Form untuk entries -->
                                    <x-show-entries :route="route('transactionsRental.index')" :search="request()->search">
                                    </x-show-entries>
                                </div>

                                {{-- <div class="sm:ml-16 sm:mt-0 sm:flex sm:space-x-4 sm:flex-none">
                                    <form action="{{ route('transactionsRental.index') }}" method="GET"
                                        class="flex items-center flex-1">
                                        <input type="text" name="search" placeholder="Enter for search . . . "
                                            id="search" value="{{ request('search') }}"
                                            class="w-56 relative inline-flex items-center px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300"
                                            oninput="this.value = this.value.toUpperCase();" />

                                        <input type="hidden" name="entries" value="{{ request('entries', 10) }}">
                                        <input type="hidden" name="page" value="{{ request('page', 1) }}">
                                    </form>
                                </div> --}}
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
                                                <th scope="col" class="px-3 py-2 text-center bg-gray-100" hidden>QR
                                                    PEMBAYARAN</th>
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
                                                    <td class="px-3 py-2 text-center hidden">
                                                        <button type="button"
                                                            onclick="pembayaran('{{ $i->id }}', '{{ $i->created_at->toIso8601String() }}', '{{ $i->proofOfPayment }}')">BAYAR</button>
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
    <div id="modal" class="hidden fixed inset-0 flex justify-center items-center z-50">
        <!-- Backdrop Blur -->
        <div class="absolute inset-0 bg-black opacity-50 backdrop-blur-sm"></div>

        <div class="bg-white rounded-lg p-6 lg:w-4/12 w-full shadow-xl z-10">
            <div class="flex">
                <div class="w-10"></div>
                <div>
                    <h2 class="text-lg font-bold mb-4 p-2 rounded-xl">Pembayaran</h2>
                </div>
            </div>

            <hr class="border mb-5 border-black border-opacity-30">

            <form id="payment-form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mt-3 justify-center">
                    <p class="text-red-600 font-bold">Sisa waktu: <span id="countdown-timer">--:--</span></p>

                    <img class="shadow-lg my-3" src="{{ url('qris/qris.png') }}" alt="QRIS image" />

                    <div class="mb-5 mt-5">
                        <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                            <i class="fi fi-rr-briefcase flex"></i>
                            <span>Upload Bukti Pembayaran</span>
                        </div>

                        <input type="file" name="proof_of_payment" id="proof_of_payment"
                            class="w-full border border-gray-300 rounded-3xl px-4" required>
                        <p id="error-proof_of_payment" class="mt-2 text-sm text-red-500 hidden">Bukti pembayaran wajib
                            diisi.</p>
                    </div>

                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="closeModal()"
                            class="bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
                        <button type="submit" class="bg-sky-500 text-white px-4 py-2 rounded">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function pembayaran() {
            const modalContent = document.getElementById("modal-content");
            const modal = document.getElementById("modal");
            modal.classList.remove("hidden");
        }

        function closeModal() {
            const modal = document.getElementById("modal");
            modal.classList.add("hidden");
        }
    </script>

    <script>
        let countdownInterval;

        function pembayaran(id, createdAt, proofOfPayment) {
            const modal = document.getElementById("modal");
            modal.classList.remove("hidden");

            // Set action untuk form manual payment
            const paymentForm = document.getElementById("payment-form");
            paymentForm.action = `/transactions-rental/${id}/update-pembayaran`;

            clearInterval(countdownInterval);

            const countdownElement = document.getElementById("countdown-timer");
            const createdAtDate = new Date(createdAt);
            const endTime = new Date(createdAtDate.getTime() + 6 * 60 * 1000);

            countdownInterval = setInterval(() => {
                const now = new Date().getTime();
                const distance = endTime - now;

                if (distance < 0) {
                    clearInterval(countdownInterval);
                    countdownElement.textContent = "Waktu habis!";

                    if (!proofOfPayment || proofOfPayment === "null") {
                        const autoForm = document.getElementById("auto-submit-form");
                        autoForm.action = `/transactions-rental/${id}`;
                        autoForm.submit();
                    }

                    return;
                }

                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                countdownElement.textContent =
                    String(minutes).padStart(2, '0') + ":" + String(seconds).padStart(2, '0');
            }, 1000);
        }

        function closeModal() {
            const modal = document.getElementById("modal");
            modal.classList.add("hidden");
            clearInterval(countdownInterval);
        }
    </script>

    <script>
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
                    await axios.post(`/transportationsRental/${id}`, {
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

        <script>
            const refreshIfExpired = () => {
                const rows = document.querySelectorAll('[data-expired-at]');

                rows.forEach(row => {
                    const expiredAt = new Date(row.getAttribute('data-expired-at'));
                    const proof = row.getAttribute('data-proof');
                    const now = new Date();

                    if (now >= expiredAt && (!proof || proof === 'null' || proof === '')) {
                        const id = row.querySelector('button').getAttribute('onclick').match(/pembayaran\('(.+?)'/)[
                            1];

                        fetch('{{ route('transactions.checkExpired') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    id
                                })
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.updated) {
                                    location.reload(); // reload hanya setelah status diubah
                                }
                            });
                    }
                });
            };

            setInterval(refreshIfExpired, 60000); // Cek tiap 5 detik
        </script>


    @endpush
</x-app-layout>
