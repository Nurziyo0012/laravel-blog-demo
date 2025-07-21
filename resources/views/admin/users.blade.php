@extends('layouts.app')

@section('title', 'Foydalanuvchilar ro‘yxati')

@section('content')
<h3>👥 Barcha foydalanuvchilar</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Ism</th>
            <th>Email</th>
            <th>Ro‘yxatga olingan sana</th>
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