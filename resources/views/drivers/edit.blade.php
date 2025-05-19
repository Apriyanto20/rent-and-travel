<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Driver') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-start justify-between gap-5">
                <div class="bg-white px-12 pt-5 pb-6 rounded-3xl border shadow-xl w-full">
                    <div class="flex items-center gap-3">
                        <div class="w-12"><img src="{{ url('/assets/img/form.png') }}" alt="" srcset="">
                        </div>
                        <div class="font-bold text-xl">Form Input Data Member</div>
                    </div>
                    <hr class="mb-4 mt-3 border-2 rounded-xl">
                    <div>
                        <form action="{{ route('drivers.update', $driver->id) }}" method="post" id="driversForm"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="border border-gray-100 px-6 pt-4 rounded-3xl mb-4">
                                <div class="text-xl font-bold">Identitas Diri</div>
                                <hr class="mb-4 w-32">
                                <div class="grid grid-cols-4 gap-5">
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-input-numeric flex"></i> <span>NIK <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" name="nik" id="nik"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="NIK ....." oninput="this.value = this.value.toUpperCase();"
                                            value="{{ $driver->nik }}">
                                        <p id="error-nik" class="mt-2 text-sm text-red-500 hidden">NIK wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-id-card-clip-alt flex"></i> <span>Nama Lengkap <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" name="name" id="name"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Nama Lengkap ....."
                                            oninput="this.value = this.value.toUpperCase();"
                                            value="{{ $driver->name }}">
                                        <p id="error-name" class="mt-2 text-sm text-red-500 hidden">Nama Lengkap wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-phone-guide flex"></i> <span>No Hanphone <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="number" name="phoneNumber" id="phoneNumber"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="No Handphone ....."
                                            oninput="this.value = this.value.toUpperCase();"
                                            value="{{ $driver->phoneNumber }}">
                                        <p id="error-phoneNumber" class="mt-2 text-sm text-red-500 hidden">No Handphone
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-envelope flex"></i> <span>Email <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="email" name="email" id="email"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Email@gmail.com ....." value="{{ $driver->email }}">
                                        <p id="error-email" class="mt-2 text-sm text-red-500 hidden">Email wajib
                                            diisi.</p>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div
                                        class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                        <i class="fi fi-rr-postal-address flex"></i> <span>Alamat <span
                                                class="text-red-500">*</span></span>
                                    </div>
                                    <textarea type="text" name="address" id="address" class="w-full border border-gray-300 rounded-3xl px-4"
                                        placeholder="Alamat ....." oninput="this.value = this.value.toUpperCase();">{{ $driver->address }}</textarea>
                                    <p id="error-address" class="mt-2 text-sm text-red-500 hidden">Alamat wajib
                                        diisi.</p>
                                </div>
                                <div class="grid grid-cols-4 gap-5">
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-calendar  flex"></i> <span>Tanggal Lahir <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="date" name="dateOfBirth" id="dateOfBirth"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Tanggal Lahir ....."
                                            oninput="this.value = this.value.toUpperCase();"
                                            value="{{ $driver->dateOfBirth }}">
                                        <p id="error-dateOfBirth" class="mt-2 text-sm text-red-500 hidden">Tanggal Lahir
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-calendar-heart flex"></i> <span>Status Pernikahan <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <select
                                            class="js-example-placeholder-single js-states form-control w-full m-6 border border-gray-300 rounded-3xl px-4"
                                            id="materialStatus" name="materialStatus"
                                            data-placeholder="Status Pernikahan">
                                            <option value="">Pilih...</option>
                                            <option value="SINGLE"
                                                {{ $driver->maritalStatus == 'SINGLE' ? 'selected' : '' }}>SINGLE
                                            </option>
                                            <option value="MARRIED"
                                                {{ $driver->maritalStatus == 'MARRIED' ? 'selected' : '' }}>MARRIED
                                            </option>
                                        </select>
                                        <p id="error-materialStatus" class="mt-2 text-sm text-red-500 hidden">Status
                                            Pernikahan wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-1 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-user flex"></i> <span>Profile <span
                                                    class="text-red-500 text-xs">
                                                    (Max 2Mb, Pdf || Jpg || Jpeg)</span></span>
                                        </div>
                                        <input type="file" name="photo" id="photo"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="No Handphone ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-photo" class="mt-2 text-sm text-red-500 hidden">Profile
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-1 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-credit-card flex"></i> <span>KTP <span
                                                    class="text-red-500 text-xs">
                                                    (Max 2Mb, Pdf || Jpg || Jpeg)</span></span>
                                        </div>
                                        <input type="file" name="photoKtp" id="photoKtp"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="No Handphone ....."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-photoKtp" class="mt-2 text-sm text-red-500 hidden">KTP
                                            wajib
                                            diisi.</p>
                                    </div>
                                </div>
                                <div class="flex gap-5 mb-5">
                                    <div>
                                        <div
                                            class="mb-1 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-user flex"></i> <span>Profile</span>
                                        </div>
                                        <img src="{{ url('/driver/img/', $driver->photo) }}"
                                            alt="{{ $driver->name }}" class="w-28 rounded-full">
                                    </div>
                                    <div>
                                        <div
                                            class="mb-1 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-credit-card flex"></i> <span>KTP</span>
                                        </div>
                                        <img src="{{ url('/driver/ktp/', $driver->photoKtp) }}"
                                            alt="{{ $driver->name }}" class="w-28">
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-100 px-6 pt-4 rounded-3xl mb-4">
                                <div class="text-xl font-bold">Lisensi dan Pengalaman</div>
                                <hr class="mb-4 w-56">
                                <div class="grid grid-cols-4 gap-5">
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-license flex"></i> <span>No SIM <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" name="driverLicenseNumber" id="driverLicenseNumber"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="No SIM ....."
                                            oninput="this.value = this.value.toUpperCase();"
                                            value="{{ $driver->driverLicenseNumber }}">
                                        <p id="error-driverLicenseNumber" class="mt-2 text-sm text-red-500 hidden">
                                            Nomor SIM
                                            wajib
                                            diisi</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-license flex"></i> <span>Jenis SIM <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <select
                                            class="js-example-placeholder-single js-states form-control w-full m-6 border border-gray-300 rounded-3xl px-4"
                                            id="licenseType" name="licenseType" data-placeholder="Jenis SIM">
                                            <option value="">Pilih...</option>
                                            <option value="A"
                                                {{ $driver->licenseType == 'A' ? 'selected' : '' }}>A</option>
                                            <option value="B"
                                                {{ $driver->licenseType == 'B' ? 'selected' : '' }}>B</option>
                                            <option value="C"
                                                {{ $driver->licenseType == 'C' ? 'selected' : '' }}>C</option>
                                        </select>
                                        <p id="error-licenseType" class="mt-2 text-sm text-red-500 hidden">Jenis SIM
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-license flex"></i> <span>Masa Berlaku SIM <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="date" name="licenseValidityDate" id="licenseValidityDate"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Masa Berlaku SIM ....."
                                            oninput="this.value = this.value.toUpperCase();"
                                            value="{{ $driver->licenseValidityDate }}">
                                        <p id="error-licenseValidityDate" class="mt-2 text-sm text-red-500 hidden">
                                            Masa Berlaku SIM
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-user-experience flex"></i> <span>Pengalaman Kerja <span
                                                    class="text-red-500">*</span>
                                        </div>
                                        <input type="number" name="workExperience" id="workExperience"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Pengalaman Kerja ....."
                                            oninput="this.value = this.value.toUpperCase();"
                                            value="{{ $driver->workExperience }}">
                                        <p id="error-workExperience" class="mt-2 text-sm text-red-500 hidden">
                                            Pengalaman Kerja
                                            wajib
                                            diisi.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-100 px-6 pt-4 rounded-3xl mb-4">
                                <div class="text-xl font-bold">Data Pekerjaan</div>
                                <hr class="mb-4 w-36">
                                <div class="grid grid-cols-4 gap-5">
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-briefcase flex"></i> <span>Status Pekerjaan<span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <select
                                            class="js-example-placeholder-single js-states form-control w-full m-6 border border-gray-300 rounded-3xl px-4"
                                            id="status" name="status" data-placeholder="Jenis SIM">
                                            <option value="">Pilih...</option>
                                            <option value="AKTIF" {{ $driver->status == 'AKTIF' ? 'selected' : '' }}>
                                                AKTIF</option>
                                            <option value="NON-AKTIF"
                                                {{ $driver->status == 'NON-AKTIF' ? 'selected' : '' }}>NON-AKTIF
                                            </option>
                                        </select>
                                        <p id="error-status" class="mt-2 text-sm text-red-500 hidden">Status Pekerjaan
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-briefcase flex"></i> <span>Tanggal Mulai Bekerja<span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="date" name="startDate" id="startDate"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Tanggal Mulai Bekerja ....."
                                            oninput="this.value = this.value.toUpperCase();"
                                            value="{{ $driver->startDate }}">
                                        <p id="error-startDate" class="mt-2 text-sm text-red-500 hidden">Tanggal Mulai
                                            Bekerja wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-memo-pad flex"></i> <span>Notes <span
                                                    class="text-red-500">*</span></span>
                                        </div>
                                        <input type="text" name="notes" id="notes"
                                            class="w-full border border-gray-300 rounded-3xl px-4"
                                            placeholder="Notes ....." oninput="this.value = this.value.toUpperCase();"
                                            value="{{ $driver->notes }}">
                                        <p id="error-notes" class="mt-2 text-sm text-red-500 hidden">Catatan Terkait
                                            Pekerjaan
                                            wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div
                                            class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                            <i class="fi fi-rr-brand flex"></i> <span>Harga<span
                                                    class="text-red-500">*</span>
                                        </div>
                                        <div class="flex gap-2">
                                            <div class="w-20">
                                                <input type="text"
                                                    class="w-full border border-gray-300 rounded-3xl px-4 bg-gray-100"
                                                    value="Rp" disabled>
                                            </div>
                                            <div class="w-full">
                                                <input type="text" id="formatted_prices"
                                                    class="w-full border border-gray-300 rounded-3xl px-4"
                                                    placeholder="Harga ....." oninput="formatRupiah(this)"
                                                    value="{{ number_format($driver->prices, 0, ',', '.') }}">
                                                <input type="hidden" name="prices" id="prices"
                                                    value="{{ $driver->prices }}">
                                            </div>
                                        </div>
                                        <p id="error-prices" class="mt-2 text-sm text-red-500 hidden">Harga
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
        document.getElementById("nik").addEventListener("input", function() {
            let nik = this.value.trim();

            if (nik.length < 16) {
                document.getElementById("error-nik").classList.add("hidden");
                return;
            }

            fetch(`/cek-nik-driver?nik=${nik}`)
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        document.getElementById("error-nik").textContent = "NIK sudah terdaftar!";
                        document.getElementById("error-nik").classList.remove("hidden");
                    } else {
                        document.getElementById("error-nik").classList.add("hidden");
                    }
                })
                .catch(error => console.error("Error:", error));
        });

        document.getElementById("email").addEventListener("input", function() {
            let email = this.value.trim();

            if (!email.includes("@") || !email.includes(".")) {
                document.getElementById("error-email").classList.add("hidden");
                return;
            }

            fetch(`/cek-email-driver?email=${encodeURIComponent(email)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        document.getElementById("error-email").textContent = "Email sudah terdaftar!";
                        document.getElementById("error-email").classList.remove("hidden");
                    } else {
                        document.getElementById("error-email").classList.add("hidden");
                    }
                })
                .catch(error => console.error("Error:", error));
        });
    </script>

    <script>
        function formatRupiah(el) {
            let value = el.value.replace(/\D/g, "");
            el.value = new Intl.NumberFormat("id-ID").format(value);
            document.getElementById('prices').value = value;
        }
    </script>

    <script>
        document.getElementById("nik").addEventListener("input", function() {
            let nik = this.value.trim();

            if (nik.length < 16) {
                document.getElementById("error-nik").classList.add("hidden");
                return;
            }

            fetch(`/cek-nik?nik=${nik}`)
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        document.getElementById("error-nik").textContent = "NIK sudah terdaftar!";
                        document.getElementById("error-nik").classList.remove("hidden");
                    } else {
                        document.getElementById("error-nik").classList.add("hidden");
                    }
                })
                .catch(error => console.error("Error:", error));
        });

        document.getElementById("email").addEventListener("input", function() {
            let email = this.value.trim();

            if (!email.includes("@") || !email.includes(".")) {
                document.getElementById("error-email").classList.add("hidden");
                return;
            }

            fetch(`/cek-email?email=${encodeURIComponent(email)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        document.getElementById("error-email").textContent = "Email sudah terdaftar!";
                        document.getElementById("error-email").classList.remove("hidden");
                    } else {
                        document.getElementById("error-email").classList.add("hidden");
                    }
                })
                .catch(error => console.error("Error:", error));
        });
    </script>

    <script>
        const form = document.getElementById('driversForm');

        const noHpInput = document.getElementById('phoneNumber');
        const errorNoHp = document.createElement('p');
        errorNoHp.id = 'error-phoneNumber';
        errorNoHp.className = 'mt-2 text-sm text-red-500 hidden';
        errorNoHp.innerText = 'No HP wajib diisi dan harus minimal 13 karakter.';
        noHpInput.parentNode.appendChild(errorNoHp);

        noHpInput.addEventListener('focus', () => {
            if (!noHpInput.value.startsWith('62')) {
                noHpInput.value = '62';
            }
        });

        noHpInput.addEventListener('input', () => {
            let value = noHpInput.value;

            // Pastikan selalu dimulai dengan "62"
            if (!value.startsWith('62')) {
                value = '62';
            }

            // Pastikan karakter setelah "62" adalah "8"
            if (value.length > 2 && value.charAt(2) !== '8') {
                value = value.slice(0, 2) + '8' + value.slice(3);
            }

            // Batasi hingga maksimal 14 karakter
            if (value.length > 14) {
                value = value.slice(0, 14);
            }

            noHpInput.value = value;

            // Tampilkan pesan error jika kurang dari 13 karakter
            if (value.length < 13) {
                errorNoHp.classList.remove('hidden');
            } else {
                errorNoHp.classList.add('hidden');
            }
        });

        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah form dikirim

            let isValid = true;

            const nik = document.getElementById('nik');
            const errorNik = document.getElementById('error-nik');
            if (nik.value === '') {
                errorNik.classList.remove('hidden');
                isValid = false;
            } else {
                errorNik.classList.add('hidden');
            }

            const name = document.getElementById('name');
            const errorName = document.getElementById('error-name');
            if (name.value === '') {
                errorName.classList.remove('hidden');
                isValid = false;
            } else {
                errorName.classList.add('hidden');
            }

            const phoneNumber = document.getElementById('phoneNumber');
            const errorPhoneNumber = document.getElementById('error-phoneNumber');
            if (phoneNumber.value === '') {
                errorPhoneNumber.classList.remove('hidden');
                isValid = false;
            } else {
                errorPhoneNumber.classList.add('hidden');
            }

            const address = document.getElementById('address');
            const errorAddress = document.getElementById('error-address');
            if (address.value === '') {
                errorAddress.classList.remove('hidden');
                isValid = false;
            } else {
                errorAddress.classList.add('hidden');
            }

            const email = document.getElementById('email');
            const errorEmail = document.getElementById('error-email');
            if (email.value === '') {
                errorEmail.classList.remove('hidden');
                isValid = false;
            } else {
                errorEmail.classList.add('hidden');
            }

            const dateOfBirth = document.getElementById('dateOfBirth');
            const errorDateOfBirth = document.getElementById('error-dateOfBirth');
            if (dateOfBirth.value === '') {
                errorDateOfBirth.classList.remove('hidden');
                isValid = false;
            } else {
                errorDateOfBirth.classList.add('hidden');
            }

            const materialStatus = document.getElementById('materialStatus');
            const errorMaterialStatus = document.getElementById('error-materialStatus');
            if (materialStatus.value === '') {
                errorMaterialStatus.classList.remove('hidden');
                isValid = false;
            } else {
                errorMaterialStatus.classList.add('hidden');
            }

            const driverLicenseNumber = document.getElementById('driverLicenseNumber');
            const errorDriverLicenseNumber = document.getElementById('error-driverLicenseNumber');
            if (driverLicenseNumber.value === '') {
                errorDriverLicenseNumber.classList.remove('hidden');
                isValid = false;
            } else {
                errorDriverLicenseNumber.classList.add('hidden');
            }

            const licenseType = document.getElementById('licenseType');
            const errorLicenseType = document.getElementById('error-licenseType');
            if (licenseType.value === '') {
                errorLicenseType.classList.remove('hidden');
                isValid = false;
            } else {
                errorLicenseType.classList.add('hidden');
            }

            const licenseValidityDate = document.getElementById('licenseValidityDate');
            const errorLicenseValidityDate = document.getElementById('error-licenseValidityDate');
            if (licenseValidityDate.value === '') {
                errorLicenseValidityDate.classList.remove('hidden');
                isValid = false;
            } else {
                errorLicenseValidityDate.classList.add('hidden');
            }

            const workExperience = document.getElementById('workExperience');
            const errorWorkExperience = document.getElementById('error-workExperience');
            if (workExperience.value === '') {
                errorWorkExperience.classList.remove('hidden');
                isValid = false;
            } else {
                errorWorkExperience.classList.add('hidden');
            }

            const status = document.getElementById('status');
            const errorStatus = document.getElementById('error-status');
            if (status.value === '') {
                errorStatus.classList.remove('hidden');
                isValid = false;
            } else {
                errorStatus.classList.add('hidden');
            }

            const startDate = document.getElementById('startDate');
            const errorStartDate = document.getElementById('error-startDate');
            if (startDate.value === '') {
                errorStartDate.classList.remove('hidden');
                isValid = false;
            } else {
                errorStartDate.classList.add('hidden');
            }

            const notes = document.getElementById('notes');
            const errorNotes = document.getElementById('error-notes');
            if (notes.value === '') {
                errorNotes.classList.remove('hidden');
                isValid = false;
            } else {
                errorNotes.classList.add('hidden');
            }

            const prices = document.getElementById('prices');
            const errorPrices = document.getElementById('error-prices');
            if (prices.value === '') {
                errorPrices.classList.remove('hidden');
                isValid = false;
            } else {
                errorPrices.classList.add('hidden');
            }

            // Jika validasi lolos, kirim form
            if (isValid) {
                form.submit();
            }
        });
    </script>

</x-app-layout>
