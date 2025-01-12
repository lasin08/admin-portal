{{-- resources/views/invoice/index.blade.php --}}
@extends('admin.dashboard')

@section('content')
    <h2>Invoice List</h2>

    <div class="text-right mb-3">
        <a href="{{ route('create', ['type' => 'invoice']) }}" class="btn btn-success admin-portal-btn">Create New Invoice</a>
    </div>

    <table class="admin-portal-table">
        <thead>
            <tr>
                <th>Invoice ID</th>
                <th>Customer Name</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->customer->name }}</td>
                    <td>{{ $invoice->amount }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>{{ $invoice->date }}</td>
                     <td>
                        <a href="{{ route('invoice.edit', ['id' => $invoice->id]) }}" class="btn btn-warning">Edit</a>
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
