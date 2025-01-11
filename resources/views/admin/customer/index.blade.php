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
@endsection
