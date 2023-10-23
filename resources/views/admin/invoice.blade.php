@extends('admin.master')

@section('content')

  <h1 class="text-center m-5">INVOICE</h1>


  <div class="container pb-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner">
                        <div class="invoice-info" id="invoice_wrapper">
                            <div class="invoice-header">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                 
                                        <p class="invoice-addr-1 mt-10">
                                            <strong>Invoice Number:</strong> <strong class="text-brand">{{ $invoice[0]->orderid }}</strong> <br />
                                            <strong>Invoice Date:</strong> {{ $invoice[0]->orderdate }} <br />
                                        
                                        </p>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6">
                                        <div class="invoice-number">
                                            <p class="invoice-title-1 mb-10"><strong>Shipping Address</strong></p>
                                            <p class="invoice-addr-1">
                                            
                                                {{ $invoice[0]->first_name }} {{ $invoice[0]->last_name }}<br />
                                                {{ $invoice[0]->billing_address1 }}<br />
                                                {{ $invoice[0]->billing_address2 }}<br />
                                                {{ $invoice[0]->billing_address3 }}<br />
                                           
                                                {{ $invoice[0]->zipcode }}<br />
                                                {{ $invoice[0]->country_name }}<br/><br/>
                                                
                                              
                                                <abbr >Phone:</abbr> {{ $invoice[0]->phone }}<br />
                                                <abbr >Email: </abbr>{{ $invoice[0]->email }}<br />
                                                
                                                
                                           
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6">
                                        <div class="invoice-number">
                                              <p class="invoice-title-1 mb-10"><strong>Billing Address</strong></p>
                                         
                                            <p class="invoice-addr-1">
                                              
                                              
                                                {{ $invoice[0]->first_name_b }} {{ $invoice[0]->last_name_b }}<br />
                                                {{ $invoice[0]->street_address_line_1_b }}<br />
                                                {{ $invoice[0]->street_address_line_2_b }}<br />
                                                {{ $invoice[0]->town_b }}<br />
                                                {{ $invoice[0]->zip_b }}<br/>
                                                {{ $invoice[0]->country_b }}<br /><br />
                                           
                                              
                                                
                                                <abbr >Phone:</abbr> {{ $invoice[0]->phone_b }}<br />
                                                <abbr >Email: </abbr>{{ $invoice[0]->email_b }}<br />
                                              
                                              
                                              
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="table-responsive">
                                    <table id="invoice" class="table table-striped invoice-table">
                                        <thead class="bg-active">
                                            <tr>
                                                <th>Item </th>
                                                <th class="text-center">Unit Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Discount</th>
                                                <th class="text-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      
                                            @foreach ($invoice as $item)
                                            <tr>
                                                <td class="text-left">{{ $item->product_name }} </td>
                                                <td class="text-center">$ {{ $item->price }}</td>
                                                <td class="text-center"> {{ $item->qty }}  </td>
                                                 <td class="text-center"> {{ $item->product_discount }} % </td>
                                                <td class="text-right">$ {{ $item->subtotal }}</td>
                                            </tr>
                                            @endforeach
                                         
                                            
                                            
                                            <tr>
                                           
                                            </tr>
                                            
                                            <tr>
                                                <td colspan="4" class="text-end f-w-600">Shipping</td>
                                                <td class="text-right">${{ $invoice[0]->country}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-end f-w-600">Grand Total</td>
                                                <td class="text-right f-w-600">${{ $invoice[0]->amount}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-bottom pb-80">
                                <div class="row">
                               
                                    <div class="col-md-6 text-end">
                                        <h6 class="mb-15">Total Amount</h6>
                                        <h3 class="mt-0 mb-0 text-brand">${{ $invoice[0]->amount}}</h3>
                                     
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="hr mt-30 mb-30"></div>
                                  
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
        
                       <div class="text-center pb-3">
                           
                     
                               <a href="{{ url('generate-pdf'.$invoice[0]->details_id) }}" type="button" class="btn btn-danger">Generate Invoice(PDF)</a>
                        </div>
                       


@endsection