<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Tag;
use App\Models\Template;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->tag_id) && $request->tag_id !== 0)
            $customers = Customer::where('tag_id', $request->tag_id)->orderBy('tag_id')->get();
        else
            $customers = Customer::orderBy('username')->get();

        return view('customers.index', ['customers' => $customers, 'tags' => Tag::orderBy('tag')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create', ['tags' => Tag::orderBy('tag')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:32',
            'email' => 'required|max:64',
        ]);

        $customer = new Customer();
        $customer->fill($request->all());
        $customer->save();
        return ($customer->save() == 1)
            ? redirect()->route('customers.index')->with('status_success', 'Customer added successfully!')
            : redirect()->route('customers.index')->with('status_error', 'Customer addition failed.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show', ['customer' => $customer, 'templates' => Template::orderBy('subject')->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', ['customer' => $customer, 'tags' => Tag::orderBy('tag')->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->validate($request, [
            'username' => 'required|unique:customers,username,' . $customer->id . ',id',
            'email' => 'required|max:64|unique:customers,email,' . $customer->id . ',id',
        ]);

        $customer->fill($request->all());
        return ($customer->save() == 1)
            ? redirect()->route('customers.index')->with('status_success', 'Customer information updated successfully!')
            : redirect()->route('customers.index')->with('status_error', 'Customer information update failed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('status_success', 'Customer removed from the database successfully!');
    }

    public function preview()
    {
        return view('customers.preview', ['templates' => Template::all()]);
    }
}
