<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Usernane</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $i => $user)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>
                    <span class="badge bg-success p-1">{{ $user->is_admin ? 'Admin' : 'User' }}</span>
                </td>
                <td>
                    <button class="btn btn-sm btn-success">Edit</button>
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
