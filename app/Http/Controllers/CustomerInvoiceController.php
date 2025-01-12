<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class CustomerInvoiceController extends Controller
{
    /**
     * Display a listing of the customers/invoices.
     * 
     * @param string $type
     * @return View
     */
    public function index(string $type): View
    {
        if ($type === 'invoice') {
            $invoices = Invoice::all();
            return view('admin.invoice.index', compact('invoices'));
        }
        if($type === 'customer') {
            $customers = Customer::all();
            return view(
        'admin.customer.index',
        compact('customers')
            );
        }
        abort(404, 'Page not found.');
    }

    /**
     * Show the form for creating a new customer/invoice.
     *
     * @param string $type
     * @return View
     */
    public function create(string $type): View
    {
        if ($type === 'invoice') {
            $customers = Customer::all();
            return view('admin.invoice.create',compact('customers') );
        }
        if ($type === 'customer') {
            return view('admin.customer.create');
        }
        abort(404, 'Page not found.');
    }

    /**
     * Store a newly created customer/invoice in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request, string $type): RedirectResponse
    {
        if ($type === 'invoice') {
            $validatedData = $this->validateInvoiceData($request);
            Invoice::create($validatedData);
            return redirect()->route('index', ['type' => 'invoice'] )
            ->with('success', 'Invoice created successfully!');
        }
        if ($type === 'customer') {
            $validatedData = $this->validateCustomerData($request);
            Customer::create($validatedData);
            return redirect()->route('index', ['type' => 'customer'])
                ->with('success', 'Customer added successfully!');
        }
        abort(404, 'Page not found.');
    }

    /**
     * Show the form for editing the specified customer.
     *
     * @param  int  $id
     * @return View
     */
    public function editCustomer(int $id): View
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.create', compact('customer'));
    }

    /**
     * Show the form for editing the specified invoice.
     *
     * @param  int  $id
     * @return View
     */
    public function editInvoice(int $id): View
    {
        $invoice = Invoice::findOrFail($id);
        $customers = Customer::all();
        return view('admin.invoice.create',
         compact('invoice', 'customers'));
    }

    /**
     * Update the specified customer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function updateCustomer(Request $request, string $id): RedirectResponse
    {
        $customer = Customer::findOrFail((int) $id);
        $validatedData = $this->validateCustomerData($request);
        $customer->update($validatedData);
        return redirect()->route('index', ['type' => 'customer'])
        ->with('success', 'Customer updated successfully!');
    }

     /**
     * Update the specified customer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function updateInvoice(Request $request, string $id): RedirectResponse
    {
        $invoice = Invoice::findOrFail((int) $id);
        $validatedData = $this->validateInvoiceData($request);
        $invoice->update($validatedData);
        return redirect()->route('index', ['type' => 'invoice'])
        ->with('success', 'Invoice updated successfully!');
    }

   /**
     * Method to validate invoice data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validateInvoiceData(Request $request): array
    {
        return $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric|min:0.01',
            'status' => 'required|in:Unpaid,Paid,Cancelled',
            'date' => 'required|date',
        ]);
    }

    /**
     * Method to validate customer data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validateCustomerData(Request $request, $customerId = null)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255|',
            'address' => 'nullable|string',
        ]);
    }

}