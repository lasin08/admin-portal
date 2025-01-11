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
@endsection
