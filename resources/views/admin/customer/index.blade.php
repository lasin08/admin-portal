@extends('admin.dashboard')

@section('content')
    <h2>Customer List</h2>
    <div class="text-right mb-3">
        <a href="{{ route('create', ['type' => 'customer']) }}" class="btn btn-success admin-portal-btn">Create New Customer</a>
    </div>
    <table class="admin-portal-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td class="text-right">
                        <a href="{{ route('customer.edit', ['id' => $customer->id]) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(session('success'))
    <div class="alert alert-success fade-out">
        {{ session('success') }}
    </div>
@endif

<style>
    @keyframes fadeOut {
        0% {
            opacity: 1;
        }
        90% {
            opacity: 0.1;
        }
        100% {
            opacity: 0;
            display: none;
        }
    }
    .fade-out {
        animation: fadeOut 2s forwards;
    }

    .alert-success {
        background-color: #d4edda; /* Light green background */
        color: #155724; /* Dark green text */
        padding: 15px 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        position: fixed;
        top: 20%; /* Adjust vertical position */
        left: 50%; /* Center horizontally */
        transform: translate(-50%, -50%);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 1000; /* Ensure it's above other elements */
        max-width: 300px; /* Limit the width */
    }
</style>

@endsection
