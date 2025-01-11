{{-- resources/views/invoice/create.blade.php --}}
@extends('admin.dashboard')

@section('content')
    <h2>{{ isset($invoice) ? 'Edit Invoice' : 'Create New Invoice' }}</h2>

    <!-- Display success message if any -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Create/Edit Invoice Form -->
    <form action="{{ isset($invoice) ? route('invoice.update', ['id' => $invoice->id]) : route('store', ['type' => 'invoice']) }}" method="POST">
        @csrf  <!-- Include CSRF token for security -->
        
        @if(isset($invoice))
            @method('PUT') <!-- Use PUT method for updating an invoice -->
        @endif

        <div class="form-group">
            <label for="customer_id">Customer</label>
            <select name="customer_id" id="customer_id" class="form-control" required>
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ isset($invoice) && $invoice->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" step="0.01" value="{{ isset($invoice) ? $invoice->amount : '' }}">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Unpaid" {{ isset($invoice) && $invoice->status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                <option value="Paid" {{ isset($invoice) && $invoice->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                <option value="Cancelled" {{ isset($invoice) && $invoice->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ isset($invoice) ? $invoice->date : '' }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($invoice) ? 'Update Invoice' : 'Create Invoice' }}</button>
    </form>
@endsection
