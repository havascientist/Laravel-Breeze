<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Data Koleksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <form action="{{ route('koleksi.registrasi') }}" method="POST">
                                    @csrf                     
                                    <div class="mb-4">
                                        <x-input-label for="namaKoleksi" :value="__('Nama Koleksi')" />
                                        <x-text-input id="namaKoleksi" class="block mt-1 w-full" type="text" name="namaKoleksi" :value="old('namaKoleksi')" required autofocus autocomplete="namaKoleksi" />
                                        <x-input-error :messages="$errors->get('namaKoleksi')" class="mt-2" />
                                    </div>                
                                    <div class="mb-4">
                                        <x-input-label for="jenisKoleksi" :value="__('Jenis Koleksi')" />
                                        <select id="jenisKoleksi" name="jenisKoleksi" class="block mt-1 w-full" required autofocus>
                                            <option value="1">Buku</option>
                                            <option value="2">Majalah</option>
                                            <option value="3">Cakram Digital</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('jenisKoleksi')" class="mt-2" />
                                    </div>                                
                                    <div class="mb-4">
                                        <x-input-label for="jumlahKoleksi" :value="__('Jumlah Koleksi')" />
                                        <x-text-input id="jumlahKoleksi" class="block mt-1 w-full" type="number" name="jumlahKoleksi" :value="old('jumlahKoleksi')" required autocomplete="jumlahKoleksi" />
                                        <x-input-error :messages="$errors->get('jumlahKoleksi')" class="mt-2" />
                                    </div>            
                                    <button type="submit" class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:ring focus:ring-blue-300">
                                        Tambah Koleksi
                                    </button>
{{-- Nama : Putri Rahel Patrisia
                        Nim : 6706223161  --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</x-app-layout>
