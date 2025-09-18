@extends('layouts.app')

@section('content')
<h2>Users</h2>
<table border="1" cellpadding="6">
    <tr><th>ID</th><th>Name</th><th>Email</th><th>Is Admin</th></tr>
    @foreach($users as $u)
    <tr>
        <td>{{ $u->id }}</td>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td>{{ $u->is_admin ? 'Yes' : 'No' }}</td>
    </tr>
    @endforeach
</table>
@endsection
