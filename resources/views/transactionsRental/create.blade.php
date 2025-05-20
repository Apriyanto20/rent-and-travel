<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Input Transaksi Rental') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-start justify-between gap-5">
                <div class="bg-white px-12 pt-5 pb-6 rounded-3xl border shadow-xl w-full">
                    <div class="flex items-center gap-3">
                        <div class="w-12"><img src="{{ url('/assets/img/form.png') }}" alt="" srcset="">
                        </div>
                        <div class="font-bold text-xl">Form Transaksi Rental</div>
                    </div>
                    <hr class="mb-4 mt-3 border-2 rounded-xl">
                    <div>
                        <form action="{{ route('transactionsRental.store') }}" method="post"
                            id="transportationsRentalForm" enctype="multipart/form-data">
                            @csrf
                            <div class="border border-gray-100 px-6 pt-4 rounded-3xl mb-4">
                                <div class="grid grid-cols-4 gap-5">
                                    <div class="mb-5 hidden">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-input-numeric flex"></i> <span>Kode Detail Transportasi
                                                <span class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" name="codeDetailTransportation"
                                            id="codeDetailTransportation"
                                            class="w-full border border-gray-300 rounded-3xl px-4 bg-gray-100"
                                            placeholder="Kode Detail Transportasi ....."
                                            oninput="this.value = this.value.toUpperCase();"
                                            value="{{ $codeDetailTransportation }}" readonly>
                                        <p id="error-codeDetailTransportation" class="mt-2 text-sm text-red-500 hidden">
                                            Kode Detail Transportasi wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-phone-guide flex"></i> <span>Kode Member<span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="number" name="memberCode" id="memberCode"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Nomor Polisi ....."
                                            oninput="this.value = this.value.toUpperCase();" required>
                                        <p id="error-memberCode" class="mt-2 text-sm text-red-500 hidden">Member Kode
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-id-card-clip-alt flex"></i> <span>Opsi Rental<span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <select
                                            class="js-example-placeholder-single js-states form-control w-full m-6 border border-gray-300 rounded-3xl px-4"
                                            id="codeRentalOption" name="codeRentalOption" data-placeholder="Opsi Rental"
                                            required>
                                            <option value="">Pilih...</option>
                                            <option value="DD">DENGAN DRIVER</option>
                                            <option value="TD">TANPA DRIVER</option>
                                        </select>
                                        <p id="error-codeRentalOption" class="mt-2 text-sm text-red-500 hidden">Opsi
                                            Rental wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5 w-full">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-id-card-clip-alt flex"></i> <span>Driver</span>
                                        </div>
                                        <select
                                            class="js-example-placeholder-single js-states form-control w-full m-6 border border-gray-300 rounded-3xl px-4"
                                            id="driver" name="driver" data-placeholder="Driver" disabled>
                                            <option value="">Pilih...</option>
                                            @foreach ($driver as $d)
                                                <option value="{{ $d->nik }}">{{ $d->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-calendar flex"></i> <span>Pengalaman</span>
                                        </div>
                                        <input type="text" name="workExperience" id="workExperience"
                                            class="w-full border border-gray-300 rounded-3xl px-4 bg-gray-200 text-gray-400"
                                            placeholder="Pengalaman ....."
                                            oninput="this.value = this.value.toUpperCase();" readonly>
                                    </div>
                                </div>
                                <div class="grid grid-cols-4 gap-5">
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-calendar flex"></i> <span>Harga Driver /Hari</span>
                                        </div>
                                        <input type="text" name="prices" id="prices"
                                            class="w-full border border-gray-300 rounded-3xl px-4 bg-gray-200 text-gray-400"
                                            placeholder="Harga Driver /Hari ....."
                                            oninput="this.value = this.value.toUpperCase();" readonly>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-calendar flex"></i> <span>Tanggal Rental<span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" id="rentalDate" name="rentalDate"
                                            class="w-full border border-gray-300 rounded-3xl px-4 py-2"
                                            placeholder="Pilih rentang tanggal" required />
                                        <p id="error-rentalDate" class="mt-2 text-sm text-red-500 hidden">Tanggal
                                            Rental
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <input type="hidden" name="rentalStartDate" id="rentalStartDate">
                                    <input type="hidden" name="rentalEndDate" id="rentalEndDate">

                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-user flex"></i> <span>Total Harga<span
                                                    class="text-red-500 text-xs">*</span></span>
                                        </div>
                                        <input type="text" name="rentalCost" id="totalPrice"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Total Harga ....."
                                            oninput="this.value = this.value.toUpperCase();" readonly>
                                    </div>
                                    <input type="hidden" name="totalPriceRental" id="totalPriceRental">
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-id-card-clip-alt flex"></i> <span>Pembayaran<span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <select class="w-full border border-gray-300 rounded-3xl px-4"
                                            name="paymentMethod" data-placeholder="Opsi Rental" required>
                                            <option value="">Pilih...</option>
                                            <option value="TRANSFER">TRANSFER</option>
                                            <option value="E-WALLET">E-WALLET</option>
                                        </select>
                                        <p id="error-paymentMethod" class="mt-2 text-sm text-red-500 hidden">
                                            Pembayaran wajib
                                            diisi.</p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <button
                                        class="flex border border-sky-500 px-4 pt-2 pb-2 rounded-full text-sky-500 hover:bg-sky-100"
                                        type="submit"><i class="fi fi-rr-disk flex mr-2 mt-1"></i> Simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        flatpickr("#production_year", {
            dateFormat: "Y",
            defaultDate: new Date(),
            onReady: function(selectedDates, dateStr, instance) {
                instance.currentYearElement.focus();
            }
        });
    </script>

    <script>
        function formatRupiah(el) {
            let value = el.value.replace(/\D/g, "");
            el.value = new Intl.NumberFormat("id-ID").format(value);
            document.getElementById('rental_price').value = value;
        }
    </script>

    {{-- <script>
        const form = document.getElementById('transportationsRentalForm');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            let isValid = true;

            const inputs = this.querySelectorAll('input');

            inputs.forEach((input) => {
                const errorElement = document.getElementById(`error-${input.name}`);

                if (input.value.trim() === '') {
                    errorElement?.classList.remove('hidden');
                    isValid = false;
                } else {
                    errorElement?.classList.add('hidden');
                }
            });

            if (isValid) {
                form.submit();
            }
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $('#codeRentalOption').select2();
            $('#driver').select2();

            $('#codeRentalOption').on('change', function() {
                const selectedValue = $(this).val();

                if (selectedValue === 'DD') {
                    $('#driver').prop('disabled', false);
                } else {
                    $('#driver').val('').trigger('change');
                    $('#driver').prop('disabled', true);
                }

                $('#driver').select2();
            });

            $('#driver').prop('disabled', true);
            $('#driver').select2();
        });

        $(document).ready(function() {
            $('#codeRentalOption').on('change', function() {
                const isDD = $(this).val() === 'DD';
                const $experience = $('#workExperience');
                const $prices = $('#prices');

                if (isDD) {
                    $experience.prop('disabled', false);
                    $experience.removeClass('bg-gray-100 text-gray-400');
                    $experience.addClass('text-black bg-white');

                    $prices.prop('disabled', false);
                    $prices.removeClass('bg-gray-100 text-gray-400');
                    $prices.addClass('text-black bg-white');
                } else {
                    $experience.prop('disabled', false); // tetap bisa diketik
                    $experience.removeClass('text-black bg-white');
                    $experience.addClass('bg-gray-100 text-gray-400');

                    $prices.prop('disabled', false); // tetap bisa diketik
                    $prices.removeClass('text-black bg-white');
                    $prices.addClass('bg-gray-100 text-gray-400');
                }
            });
        });
    </script>

    <script>
        $('.js-example-placeholder-single').on('change', function() {
            const nik = $(this).val();

            if (!nik) {
                $('#workExperience').val('');
                $('#prices').val('');
                return;
            }

            fetch(`/get-driver/${nik}`)
                .then(response => response.json())
                .then(data => {
                    if (data.experience !== undefined && data.experience !== null) {
                        $('#workExperience').val(`${data.experience} TAHUN`);
                        $('#prices').val(`${data.prices}`);
                    } else {
                        $('#workExperience').val('');
                        $('#prices').val('');
                    }
                })
                .catch(error => {
                    console.error('Error ambil pengalaman:', error);
                    $('#workExperience').val('');
                    $('#prices').val('');
                });
        });
    </script>

    <script>
        const rentalPrice = {{ $transportation->rental_price }}; // Misal 150000

        const picker = new Litepicker({
            element: document.getElementById('rentalDate'),
            singleMode: false,
            format: 'YYYY-MM-DD',
            numberOfMonths: 2,
            numberOfColumns: 2,
            autoApply: true,
            setup: (picker) => {
                picker.on('selected', (startDate, endDate) => {
                    const start = new Date(startDate.dateInstance);
                    const end = new Date(endDate.dateInstance);

                    // Set nilai ke input hidden
                    document.getElementById('rentalStartDate').value = start.toISOString().split('T')[
                        0];
                    document.getElementById('rentalEndDate').value = end.toISOString().split('T')[0];

                    const timeDiff = end - start;
                    const days = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1;

                    const driverPriceInput = document.getElementById('prices').value.replace(/[^0-9]/g,
                        '');
                    const driverPrice = driverPriceInput ? parseInt(driverPriceInput) : 0;

                    const rentalTotal = days * rentalPrice;
                    const driverTotal = days * driverPrice;
                    const total = rentalTotal + driverTotal;

                    document.getElementById('totalPrice').value = total.toLocaleString('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    });

                    document.getElementById('totalPriceRental').value = total;
                    document.getElementById('totalDays').innerText = days;
                });

            }
        });
    </script>
    @push('scripts')
        <script>
            const refreshIfExpired = () => {
                const rows = document.querySelectorAll('[data-expired-at]');

                rows.forEach(row => {
                    const expiredAt = new Date(row.getAttribute('data-expired-at'));
                    const proof = row.getAttribute('data-proof');

                    const now = new Date();
                    if (now >= expiredAt && (!proof || proof === 'null')) {
                        location.reload();
                    }
                });
            };

            setInterval(refreshIfExpired, 5000);
        </script>
    @endpush
</x-app-layout>
