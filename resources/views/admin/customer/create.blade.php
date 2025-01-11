<!-- resources/views/customer/form.blade.php -->

@extends('admin.dashboard')

@section('content')
    <h2>{{ isset($customer) ? 'Edit Customer' : 'Create New Customer' }}</h2>

    <!-- Display success message if any -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Dynamic Form (Reuse for Create/Edit) -->
    <form 
        action="{{ isset($customer) ? route('update', ['id' => $customer->id]) : route('store', ['type' => 'customer']) }}" 
        method="POST">
        
        @csrf
        
        @if(isset($customer))
            @method('PUT') <!-- Spoof the PUT method for update -->
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $customer->name ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $customer->email ?? '' }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $customer->phone ?? '' }}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="address" class="form-control">{{ $customer->address ?? '' }}</textarea>
        </div>

        <!-- Styled Submit Button -->
        <button type="submit" class="btn btn-primary">
            {{ isset($customer) ? 'Update Customer' : 'Create Customer' }}
        </button>
    </form>
@endsection
