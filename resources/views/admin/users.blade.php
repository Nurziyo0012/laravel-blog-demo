@extends('layouts.app')

@section('title', 'User list')

@section('content')
<h3>👥 All users</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Registered day</th>
            <th>Admin?</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at->format('d-m-Y') }}</td>
            <td>
                @if($user->is_admin)
                    ✅
                @else
                    ❌
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection