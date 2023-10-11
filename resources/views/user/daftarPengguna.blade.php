<resources>
<views>
<users>
<index class="blade php"></index>

<h1>Daftar Pengguna</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Fullname</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->fullname }}</td>
            <td>{{ $user->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

// -- Nama : Putri Rahel Patrisia
// -- Nim : 6706223161
