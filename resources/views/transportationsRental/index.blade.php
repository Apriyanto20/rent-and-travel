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
                            <div class="w-12"><img src="{{ url('/assets/img/data.png') }}" alt="" srcset="">
                            </div>
                            <div class="font-bold text-xl">Transportasi Rental</div>
                        </div>
                        <div class="flex items-center">
                            <a href="{{ route('transportationsRental.create') }}"
                                class="border border-sky-500 text-sky-500 px-6 py-2 font-bold rounded-xl hover:bg-sky-100"><i
                                    class="fi fi-rr-add mr-1"></i> <span>Tambah Transportasi</span></a>
                        </div>
                    </div>
                    <hr class="mb-4 mt-3 border-2 rounded-xl">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
