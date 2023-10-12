<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Nama Koleksi') }}
        </h2>
    </x-slot>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 25%
        }

        th, td {
            border: 1px solid #ffffff;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #fffbfb;
        }

        .tulisan1{
            color: #fffbfb;
        }
    </style>
<br><br>
    <table>
        <thead>
            <tr>
                <th>Nama Koleksi</th>
                <th>Jenis Koleksi</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($collections as $collection)
                <tr>
                    <td class = "tulisan1">{{ $collection->namaKoleksi }}</td>
                    <td class = "tulisan1">{{ $collection->jenisKoleksi }}</td>
                    <td class = "tulisan1">{{ $collection->createdAt }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
