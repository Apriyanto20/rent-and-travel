<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Member') }}
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
                        <form action="{{ route('members.update', $members->id) }}" method="post" id="membersForm"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="grid grid-cols-4 gap-5">
                                <div class="mb-5">
                                    <div
                                        class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                        <i class="fi fi-rr-input-numeric  flex"></i> <span>NIK <span
                                                class="text-red-500">*</span></span>
                                    </div>
                                    <input type="text" name="nik" id="nik"
                                        class="w-full border border-gray-300 rounded-3xl px-4" placeholder="NIK ....."
                                        oninput="this.value = this.value.toUpperCase();" value="{{ $members->nik }}">
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
                                        oninput="this.value = this.value.toUpperCase();" value="{{ $members->name }}">
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
                                        value="{{ $members->phoneNumber }}">
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
                                        placeholder="Email@gmail.com ....." value="{{ $members->email }}">
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
                                    placeholder="Alamat .....">{{ $members->address }}</textarea>
                                <p id="error-address" class="mt-2 text-sm text-red-500 hidden">Alamat wajib
                                    diisi.</p>
                            </div>
                            <div class="grid grid-cols-4 gap-5">
                                <div class="mb-5">
                                    <div
                                        class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                        <i class="fi fi-rr-calendar flex"></i> <span>Tanggal Lahir <span
                                                class="text-red-500">*</span></span>
                                    </div>
                                    <input type="date" name="dateOfBirth" id="dateOfBirth"
                                        class="w-full border border-gray-300 rounded-3xl px-4"
                                        placeholder="Tanggal Lahir ....."
                                        oninput="this.value = this.value.toUpperCase();"
                                        value="{{ $members->dateOfBirth }}">
                                    <p id="error-dateOfBirth" class="mt-2 text-sm text-red-500 hidden">Tanggal Lahir
                                        wajib
                                        diisi.</p>
                                </div>
                                <div class="mb-5">
                                    <div
                                        class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                        <i class="fi fi-rr-venus-mars flex"></i> <span>Jenis Kelamin <span
                                                class="text-red-500">*</span></span>
                                    </div>
                                    <select
                                        class="js-example-placeholder-single js-states form-control w-full m-6 border border-gray-300 rounded-3xl px-4"
                                        id="gender" name="gender" data-placeholder="Jenis Kelamin">
                                        <option value="FEMALE" {{ $members->gender == 'FEMALE' ? 'selected' : '' }}>
                                            PEREMPUAN</option>
                                        <option value="MALE" {{ $members->gender == 'MALE' ? 'selected' : '' }}>
                                            LAKI-LAKI</option>
                                    </select>
                                    <p id="error-gender" class="mt-2 text-sm text-red-500 hidden">Jenis Kelamin wajib
                                        diisi.</p>
                                </div>
                                <div class="mb-5">
                                    <div
                                        class="mb-1 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                        <i class="fi fi-rr-user flex"></i> <span>Profile <span class="text-red-500">*
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
                                        <i class="fi fi-rr-credit-card flex"></i> <span>KTP <span class="text-red-500">*
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
                                    <img src="{{ url('/member/img/', $members->photo) }}" alt="{{ $members->name }}"
                                        class="w-28 rounded-full">
                                </div>
                                <div>
                                    <div
                                        class="mb-1 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                                        <i class="fi fi-rr-credit-card flex"></i> <span>KTP</span>
                                    </div>
                                    <img src="{{ url('/member/ktp/', $members->photoKtp) }}"
                                        alt="{{ $members->name }}" class="w-28">
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

    {{-- <script>
        const form = document.getElementById('membersForm');

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

            const gender = document.getElementById('gender');
            const errorGender = document.getElementById('error-gender');
            if (gender.value === '') {
                errorGender.classList.remove('hidden');
                isValid = false;
            } else {
                errorGender.classList.add('hidden');
            }

            // Jika validasi lolos, kirim form
            if (isValid) {
                form.submit();
            }
        });
    </script> --}}

</x-app-layout>
