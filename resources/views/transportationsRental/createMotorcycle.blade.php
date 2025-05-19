<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Input Transportasi Rental') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-start justify-between gap-5">
                <div class="bg-white px-12 pt-5 pb-6 rounded-3xl border shadow-xl w-full">
                    <div class="flex items-center gap-3">
                        <div class="w-12"><img src="{{ url('/assets/img/form.png') }}" alt="" srcset="">
                        </div>
                        <div class="font-bold text-xl">Form Input Transportasi Rental</div>
                    </div>
                    <hr class="mb-4 mt-3 border-2 rounded-xl">
                    <div>
                        <form action="{{ route('transportationsRentalMotorcycle.store') }}" method="post"
                            id="transportationsRentalForm" enctype="multipart/form-data">
                            @csrf
                            <div class="border border-gray-100 px-6 pt-4 rounded-3xl mb-4">
                                <div class="text-xl font-bold">Identitas Kendaraan</div>
                                <hr class="mb-4 w-32">
                                <div class="grid grid-cols-4 gap-5">
                                    <div class="mb-5 hidden">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-input-numeric flex"></i> <span>Kode Detail Transportasi
                                                <span class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" id="codeTransportation" name="codeTransportation"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Kode Detail Transportasi ....."
                                            oninput="this.value = this.value.toUpperCase();" value="TP00002">
                                        <p id="error-codeDetailTransportation" class="mt-2 text-sm text-red-500 hidden">
                                            Kode Detail Transportasi wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
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
                                            value="{{ $codeRentalMotor }}" readonly>
                                        <p id="error-codeDetailTransportation" class="mt-2 text-sm text-red-500 hidden">
                                            Kode Detail Transportasi wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-id-card-clip-alt flex"></i> <span>Merk <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <select
                                            class="js-example-placeholder-single js-states form-control w-full m-6 border border-gray-300 rounded-3xl px-4"
                                            id="codeMerk" name="codeMerk" data-placeholder="Merk">
                                            <option value="">Pilih...</option>
                                            @foreach ($merk as $m)
                                                <option value="{{ $m->codeMerk }}">{{ $m->merk }}</option>
                                            @endforeach
                                        </select>
                                        <p id="error-codeMerk" class="mt-2 text-sm text-red-500 hidden">Merk wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-phone-guide flex"></i> <span>Nomor Polisi<span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" name="license_plate" id="license_plate"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Nomor Polisi ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-license_plate" class="mt-2 text-sm text-red-500 hidden">Nomor
                                            Polisi
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-envelope flex"></i> <span>Model <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" name="model" id="model"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Model .....">
                                        <p id="error-model" class="mt-2 text-sm text-red-500 hidden">Model wajib
                                            diisi.</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-4 gap-5">
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-calendar flex"></i> <span>Nomor Rangka Kendaraan <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" name="chassis_number" id="chassis_number"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Nomor Rangka Kendaraan ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-chassis_number" class="mt-2 text-sm text-red-500 hidden">Nomor
                                            Rangka Kendaraan
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-1 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-user flex"></i> <span>Nomor Mesin Kendaraan <span
                                                    class="text-red-500 text-xs">*</span></span>
                                        </div>
                                        <input type="text" name="engine_number" id="engine_number"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Nomor Mesin Kendaraan ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-engine_number" class="mt-2 text-sm text-red-500 hidden">Nomor
                                            Mesin Kendaraan
                                            wajib
                                            diisi.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-100 px-6 pt-4 rounded-3xl mb-4">
                                <div class="text-xl font-bold">Spesifikasi Teknis</div>
                                <hr class="mb-4 w-56">
                                <div class="grid grid-cols-4 gap-5">
                                    <div class="">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-license flex"></i> <span>Warna <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" name="color" id="color"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Warna ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-color" class="mt-2 text-sm text-red-500 hidden">
                                            Warna
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div class="">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-license flex"></i> <span>Jumlah Kursi <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="number" name="seats" id="seats"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Jumlah Kursi ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-seats" class="mt-2 text-sm text-red-500 hidden">Jumlah Kursi
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div class="">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-license flex"></i> <span>Tahun Produksi Kendaraan <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" name="production_year" id="production_year"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Tahun Produksi Kendaraan ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-production_year" class="mt-2 text-sm text-red-500 hidden">
                                            Tahun Produksi Kendaraan
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div class="">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-user-experience flex"></i> <span>Kapasitas Mesin <span
                                                    class="text-red-500">*</span>
                                        </div>
                                        <input type="text" name="engine_capacity" id="engine_capacity"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Kapasitas Mesin ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-engine_capacity" class="mt-2 text-sm text-red-500 hidden">
                                            Kapasitas Mesin
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div class="">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-user-experience flex"></i> <span>Bahan Bakar <span
                                                    class="text-red-500">*</span>
                                        </div>
                                        <input type="text" name="fuel_type" id="fuel_type"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Bahan Bakar ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-fuel_type" class="mt-2 text-sm text-red-500 hidden">
                                            Bahan Bakar
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-user-experience flex"></i> <span>Jenis Transmisi <span
                                                    class="text-red-500">*</span>
                                        </div>
                                        <input type="text" name="transmission" id="transmission"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Jenis Transmisi ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-transmission" class="mt-2 text-sm text-red-500 hidden">
                                            Jenis Transmisi
                                            wajib
                                            diisi.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-100 px-6 pt-4 rounded-3xl mb-4">
                                <div class="text-xl font-bold">Status dan Legalitas</div>
                                <hr class="mb-4 w-36">
                                <div class="grid grid-cols-4 gap-5">
                                    <div>
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-briefcase flex"></i> <span>Status Kendaraan<span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" name="vehicle_statuses" id="vehicle_statuses"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Status Kendaraan ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-vehicle_statuses" class="mt-2 text-sm text-red-500 hidden">Status
                                            Kendaraan wajib
                                            diisi.</p>
                                    </div>
                                    <div>
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-memo-pad flex"></i> <span>Status Kepemilikan <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" name="ownership_status" id="ownership_status"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Status Kepemilikan ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-ownership_status" class="mt-2 text-sm text-red-500 hidden">Status
                                            Kepemilikan
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div>
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-memo-pad flex"></i> <span>Tanggal Registrasi Kendaraan
                                                <span class="text-red-500">*</span></span>
                                        </div>
                                        <input type="date" name="registration_date" id="registration_date"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Tanggal Registrasi Kendaraan ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-registration_date" class="mt-2 text-sm text-red-500 hidden">
                                            Tanggal Registrasi Kendaraan
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div>
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-memo-pad flex"></i> <span>Masa Berlaku Pajak Kendaraan
                                                <span class="text-red-500">*</span></span>
                                        </div>
                                        <input type="date" name="tax_validity_date" id="tax_validity_date"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Masa Berlaku Pajak Kendaraan ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-tax_validity_date" class="mt-2 text-sm text-red-500 hidden">Masa
                                            Berlaku Pajak Kendaraan
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div>
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-memo-pad flex"></i> <span>Kondisi Kendaraan <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" name="vehicle_condition" id="vehicle_condition"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Kondisi Kendaraan ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-vehicle_condition" class="mt-2 text-sm text-red-500 hidden">
                                            Kondisi Kendaraan
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div>
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-memo-pad flex"></i> <span>Status Asuransi <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" name="insurance_status" id="insurance_status"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Status Asuransi ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-insurance_status" class="mt-2 text-sm text-red-500 hidden">Status
                                            Asuransi
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div>
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-memo-pad flex"></i> <span>Lokasi Kendaraan <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" name="location" id="location"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Lokasi Kendaraan ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-location" class="mt-2 text-sm text-red-500 hidden">Lokasi
                                            Kendaraan
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-brand flex"></i> <span>Harga Sewa<span
                                                    class="text-red-500">*</span>
                                        </div>
                                        <div class="flex gap-2">
                                            <div class="w-20"><input type="text"
                                                    class="w-full border border-gray-300 rounded-3xl px-4 bg-gray-100"
                                                    value="Rp" disabled></div>
                                            <div class="w-full">
                                                <input type="text" id="formatted_prices" data-target="prices"
                                                    class="w-full border border-gray-300 rounded-3xl px-4"
                                                    placeholder="Harga ....." oninput="formatRupiah(this)">

                                                <input type="hidden" id="rental_price" name="rental_price">
                                            </div>
                                        </div>
                                        <p id="error-prices" class="mt-2 text-sm text-red-500 hidden">Harga Sewa
                                            wajib
                                            diisi.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-100 px-6 pt-4 rounded-3xl mb-4">
                                <div class="text-xl font-bold">Foto Kendaraan</div>
                                <hr class="mb-4 w-36">
                                <div class="grid grid-cols-4 gap-5">

                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-briefcase flex"></i> <span>Foto Depan<span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="file" name="photo_front" id="photo_front"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Foto Depan ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-photo_front" class="mt-2 text-sm text-red-500 hidden">Foto Depan
                                            Bekerja wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-briefcase flex"></i> <span>Foto Kanan<span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="file" name="photo_right" id="photo_right"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Foto Kanan ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-photo_right" class="mt-2 text-sm text-red-500 hidden">Foto Kanan
                                            Bekerja wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-briefcase flex"></i> <span>Foto Kiri<span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="file" name="photo_left" id="photo_left"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Foto Kiri ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-photo_left" class="mt-2 text-sm text-red-500 hidden">Foto Kiri
                                            Bekerja wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-briefcase flex"></i> <span>Foto Belakang<span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="file" name="photo_back" id="photo_back"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Foto Belakang ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-photo_back" class="mt-2 text-sm text-red-500 hidden">Foto
                                            Belakang
                                            Bekerja wajib
                                            diisi.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-100 px-6 pt-4 rounded-3xl mb-4">
                                <div class="text-xl font-bold">Catatan Tambahan</div>
                                <hr class="mb-4 w-36">
                                <div class="grid grid-cols-4 gap-5">
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-memo-pad flex"></i> <span>Notes <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" name="notes" id="notes"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Notes ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-notes" class="mt-2 text-sm text-red-500 hidden">Catatan Terkait
                                            Pekerjaan
                                            wajib
                                            diisi.</p>
                                    </div>
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

    <script>
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
    </script>

</x-app-layout>
