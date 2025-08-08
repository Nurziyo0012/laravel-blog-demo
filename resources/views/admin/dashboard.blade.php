@extends('layouts.app')

@section('content')
<style>
    .dashboard-container {
        max-width: 1000px;
        margin: 50px auto;
        background: #ffffff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border-radius: 12px;
        padding: 40px;
        font-family: 'Segoe UI', sans-serif;
    }

    .dashboard-title {
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 30px;
        text-align: center;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .stat-number {
        font-size: 28px;
        font-weight: bold;
        color: #007bff;
    }

    .stat-label {
        font-size: 16px;
        color: #555;
    }

    .actions {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .btn-custom {
        padding: 12px 24px;
        border-radius: 6px;
        font-weight: 500;
        text-decoration: none;
        transition: background 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-manage {
        background: #17a2b8;
        color: white;
    }

    .btn-create {
        background: #28a745;
        color: white;
    }

    .btn-custom:hover {
        opacity: 0.9;
    }
</style>

<div class="dashboard-container">
    <h1 class="dashboard-title">📊 Admin Dashboard</h1>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">{{ $postCount }}</div>
            <div class="stat-label">Total Posts</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ $userCount }}</div>
            <div class="stat-label">Registered Users</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ $commentCount }}</div>
            <div class="stat-label">Comments</div>
        </div>
    </div>

    <div class="actions">
        <a href="{{ route('posts.index') }}" class="btn-custom btn-manage">🛠 Manage Posts</a>
        <a href="{{ route('posts.create') }}" class="btn-custom btn-create">➕ Create New Post</a>
    </div>
</div>
@endsection