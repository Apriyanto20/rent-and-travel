<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Transportasi</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Config Inline -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Flaticon -->
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>

<body class="bg-gray-100 px-24 pt-6 font-poppins">
    <div class="flex">
        <div class="w-full border-2 border-gray-200 p-4">
            <div class="flex gap-1">Mobil <div class="mt-[2px]"><i class="fi fi-rr-caret-right"></i></div> <span
                    class="text-amber-500 font-bold">Detail</span></div>
            <div class="text-[35px] font-bold">{{ $transportationsRental->merk->merk }} -
                {{ $transportationsRental->model }}</div>
            <div class="flex">
                <div class="mr-1">Rp</div>
                <div class="font-bold text-2xl">{{ $transportationsRental->rental_price }}</div>
                <div class="text-xs mt-[10px]">/Hari</div>
            </div>
            <div class="bg-red-500 h-[600px] w-full mt-4 rounded-[30px]">
                <img id="mainImage" src="{{ asset('rental/car/' . $transportationsRental->photo_front) }}"
                    alt="" class="w-full h-full object-cover rounded-[30px]">
            </div>
            <div class="flex mt-4 gap-2 justify-between">
                <div class="relative bg-red-500 h-28 w-52 cursor-pointer group inactive"
                    onclick="changeImage('{{ asset('rental/car/' . $transportationsRental->photo_left) }}', this)">
                    <img src="{{ asset('rental/car/' . $transportationsRental->photo_left) }}" alt=""
                        class="w-full h-full object-cover pointer-events-none">
                    <div
                        class="absolute inset-0 bg-white/60 opacity-0 group-[.inactive]:opacity-100 transition-opacity duration-300 rounded">
                    </div>
                </div>

                <div class="relative bg-red-500 h-28 w-52 cursor-pointer group inactive"
                    onclick="changeImage('{{ asset('rental/car/' . $transportationsRental->photo_right) }}', this)">
                    <img src="{{ asset('rental/car/' . $transportationsRental->photo_right) }}" alt=""
                        class="w-full h-full object-cover pointer-events-none">
                    <div
                        class="absolute inset-0 bg-white/60 opacity-0 group-[.inactive]:opacity-100 transition-opacity duration-300 rounded">
                    </div>
                </div>

                <div class="relative bg-red-500 h-28 w-52 cursor-pointer group inactive"
                    onclick="changeImage('{{ asset('rental/car/' . $transportationsRental->photo_back) }}', this)">
                    <img src="{{ asset('rental/car/' . $transportationsRental->photo_back) }}" alt=""
                        class="w-full h-full object-cover pointer-events-none">
                    <div
                        class="absolute inset-0 bg-white/60 opacity-0 group-[.inactive]:opacity-100 transition-opacity duration-300 rounded">
                    </div>
                </div>

                <div class="relative bg-red-500 h-28 w-52 cursor-pointer group"
                    onclick="changeImage('{{ asset('rental/car/' . $transportationsRental->photo_front) }}', this)">
                    <img src="{{ asset('rental/car/' . $transportationsRental->photo_front) }}" alt=""
                        class="w-full h-full object-cover pointer-events-none">
                    <div
                        class="absolute inset-0 bg-white/60 opacity-0 group-[.inactive]:opacity-100 transition-opacity duration-300 rounded">
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/2 border-2 border-gray-200 p-4">
            <div class="flex items-end justify-end">
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <div class="mb-28 pr-6 font-bold text-lg">Keterangan Transportasi</div>
                        @else
                            <a href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white font-bold border border-gray-500">
                                Sign In
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white font-bold">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
            <div class="font-bold">
                Warna
            </div>
            <div class="text-gray-500 mt-3 text-sm">{{ $transportationsRental->color }}</div>
            <hr class="border mt-4 mb-4">
            <div class="font-bold">
                Jumlah Kursi
            </div>
            <div class="text-gray-500 mt-3 text-sm">{{ $transportationsRental->seats }}</div>
            <hr class="border mt-4 mb-4">
            <div class="font-bold">
                Bahan Bakar
            </div>
            <div class="text-gray-500 mt-3 text-sm">{{ $transportationsRental->fuel_type }}</div>
            <hr class="border mt-4 mb-4">
            <div class="font-bold">
                Jenis Transmisi
            </div>
            <div class="text-gray-500 mt-3 text-sm">{{ $transportationsRental->transmission }}</div>
            <hr class="border mt-4 mb-4">
            <div class="font-bold">
                Note
            </div>
            <div class="text-gray-500 mt-3 text-sm">{{ $transportationsRental->notes }}</div>
            <hr class="border mt-4 mb-4">
            <div class="font-bold">
                Status Kendaraan
            </div>
            @php
                if ($transportationsRental->vehicle_statuses == 'TERSEDIA') {
                    $bg = 'bg-emerald-100';
                    $text = 'text-emerald-500';
                    $border = 'border-emerald-500';
                    $above = 'Ready';
                } else {
                    $bg = 'bg-red-100';
                    $text = 'text-red-500';
                    $border = 'border-red-500';
                    $above = 'Not For';
                }

            @endphp
            <div
                class="{{ $text }} {{ $bg }} {{ $border }} border inline-block px-4 font-bold py-2 rounded-3xl  mt-3 text-sm">
                {{ $transportationsRental->vehicle_statuses }}</div>

            <div class="flex justify-between mt-8 items-center">
                <div class="w-full">
                    <div class="font-bold text-xl">{{ $transportationsRental->merk->merk }} -
                        {{ $transportationsRental->model }}</div>
                    <div class="text-sm">{{ $above }} for Rent</div>
                </div>
                @if ($transportationsRental->vehicle_statuses != 'TERSEDIA')
                    <div class="w-[35%] text-end bg-sky-600 flex items-center justify-between rounded-xl px-4 py-2 text-white  font-boldx">
                                Rp {{ $transportationsRental->rental_price }} <span
                                    class="bg-white bg-blend-multiply bg-opacity-25  w-7 h-7 pt-1 rounded-lg text-center flex items-center justify-center"><i
                                        class="fi fi-br-arrow-right"></i></span>
                            </div>
                @else
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('transactionsRental.create.withCode', $transportationsRental->codeDetailTransportation) }}"
                                class="w-[35%] text-end bg-sky-600 flex items-center justify-between rounded-xl px-4 py-2 text-white  font-boldx">
                                Rp {{ $transportationsRental->rental_price }} <span
                                    class="bg-white bg-blend-multiply bg-opacity-25  w-7 h-7 pt-1 rounded-lg text-center flex items-center justify-center"><i
                                        class="fi fi-br-arrow-right"></i></span>
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="w-[35%] text-end bg-sky-600 flex items-center justify-between rounded-xl px-4 py-2 text-white  font-boldx">
                                Rp <span class="pr-4">{{ $transportationsRental->rental_price }}</span> <span
                                    class="bg-white bg-blend-multiply bg-opacity-25 w-7 h-7 pt-1 rounded-lg text-center flex items-center justify-center"><i
                                        class="fi fi-br-arrow-right"></i></span>
                            </a>
                        @endauth
                    @endif
                @endif
            </div>
        </div>
    </div>
    <script>
        const mainImage = document.getElementById('mainImage');

        function changeImage(src, clickedEl) {
            mainImage.src = src;

            document.querySelectorAll('.group').forEach(div => {
                div.classList.add('inactive');
            });

            clickedEl.classList.remove('inactive');
        }

        window.onload = () => {
            const defaultSrc = mainImage.src;
            document.querySelectorAll('.group').forEach(div => {
                const img = div.querySelector('img');
                if (img.src === defaultSrc) {
                    div.classList.remove('inactive');
                } else {
                    div.classList.add('inactive');
                }
            });
        };
    </script>

</body>

</html>
