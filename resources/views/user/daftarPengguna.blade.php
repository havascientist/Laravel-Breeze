<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Pengguna') }}
        </h2>
    </x-slot>

<style> 
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 1em;
}

table, th, td {
    border: 2px solid rgb(21, 60, 169);
}

th, td {
    padding: 10px;
    text-align: left;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.tulisan{
    color : white;
}

/* Tambahkan CSS ini jika Anda ingin membuat tabel dapat digulir jika kontennya terlalu panjang */
.table-container {
    max-height: 300px; /* Sesuaikan tinggi maksimal sesuai kebutuhan Anda */
    overflow-y: auto;
}
</style>


<br><br>
<table>
    <thead>
        <tr>
            <th class = "tulisan">ID</th>
            <th class = "tulisan">Fullname</th>
            <th class = "tulisan">Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td class = "tulisan">{{ $user->id }}</td>
            <td class = "tulisan">{{ $user->fullname }}</td>
            <td class = "tulisan">{{ $user->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</x-app-layout>