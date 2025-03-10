<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tranportasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl sm:px-6 lg:px-6">
            <div class="mx-36">
                <div class="font-extrabold text-[26px] text-[#0D0C41]">Form Input Transportasi</div>
                <div class="text-[#9D9DBC] text-[16px]">Rent and Travel</div>
                <div class="flex">
                    <div class="bg-white px-12 py-6 pb-11 mt-4 shadow-xl rounded-[35px] w-full">
                        <form action="{{route('transportations.store')}}" method="post">
                            @csrf
                            <div>
                                <div class="font-extrabold text-lg mb-2">Kode Transportasi</div>
                                <input type="text" class="border border-[#D8D8E4] w-full rounded-full h-[55px]"
                                    name="codeTransportation px-12" placeholder="Kode Transportasi ...">
                            </div>
                            <div class="mt-4">
                                <div class="font-extrabold text-lg mb-2">Jenis Transportasi</div>
                                <input type="text" class="border border-[#D8D8E4] w-full rounded-full h-[55px]"
                                    name="codeTransportation px-12" placeholder="Jenis Transportasi ...">
                            </div>
                            <div class="mt-8">
                                <button class="flex items-center justify-center p-4 bg-[#4743FB] font-extrabold text-lg text-white w-full rounded-full h-[55px]">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div>
                        {{-- data--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
