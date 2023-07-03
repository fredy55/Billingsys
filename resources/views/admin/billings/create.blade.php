@extends('admin.layouts.layout3')

<!-- Website title -->
@section('title', 'Add Client Billings')

@section('contents')
    <!-- container -->
    <div class="container-fluid">	
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Create Bills</h4>
                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Billing Info</span>
                </div>
            </div>
            <div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <a href="{{ route('clients.list') }}" type="button" class="btn btn-primary btn-md">
                    <i class="fas fa-arrow-left"></i> Back to Client List
                </a>
            </div>
        </div>
        <!-- breadcrumb -->

        <!-- row opened -->
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class=" main-content-body-invoice">
                    <div class="card card-invoice">
                        <div class="card-body">
                            <!-- Invoice-header -->
                            <div class="invoice-header">
                                <h1 class="invoice-title">Invoice</h1>
                                <div class="billed-from">
                                        <p>
                                        <h4>
                                            @if ($compinfo->img_url!=="nil")
                                              <img alt="avatar" src="{{ asset($compinfo->img_url) }}" alt="Company Logo" width="45px"/>
                                            @else
                                                <img alt="avatar" src="{{ asset('img/brand/logo.png') }}" alt="Company Logo" width="45px"/>
                                            @endif
                                            {{ $compinfo['ctname'] }}
                                        </h4>
                                        <address>{{ $compinfo['addressln1'] }}, {{ $compinfo['city'] }}, {{ $compinfo['state'] }}, {{ $compinfo['country'] }}</address>   
                                        <strong>Email:</strong> {{ $compinfo['email'] }}<br>
                                        <strong>Office Tel:</strong> {{ $compinfo['phone_no'] }}
                                    </p>
                                </div><!-- billed-from -->
                            </div>
                            
                            <!-- Invoice-information -->
                            <div class="row mg-t-20">
                                <div class="col-md-6">
                                    <label class="tx-black tx-15">Billed To</label>
                                    <div class="billed-to">
                                        <h6>{{ $client['ctname'] }}</h6>
                                        <p>
                                            <address>{{ $client['addressln1'] }}, {{ $client['city'] }}, {{ $client['state'] }}, {{ $client['country'] }}</address>   
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="tx-black tx-15"></label>
                                    <p>
                                        <strong>Email:</strong> {{ $client['email'] }}<br>
                                        <strong>Office Tel:</strong> {{ $client['phone_no'] }}
                                        </p>
                                </div>
                            </div>
                            
                            <!-- Invoice-items-input -->
                            <div class="row mg-t-20">
                                <div class="col-md-4 col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <strong>Item</strong> 
                                        <select id="itemId" onchange="getOptions(this.value)" class="form-control" required>
                                            <option value="">--- Select Service Item ---</option>
                                            @foreach ($services as $option)
                                                <option value="{{ $option->service_id }}">{{ $option->sname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3 col-lg-3 col-xs-12">
                                    <div class="form-group">
                                        <strong>Price</strong>  
                                        <input id="itemPrice" type="number" class="form-control" placeholder="Price of Item" readonly required />
                                        <input id="itemName" type="hidden" class="form-control" required />
                                        <input id="itemDesc" type="hidden" class="form-control" required />
                                    </div>
                                </div>
                                
                                <div class="col-md-3 col-lg-3 col-xs-12">
                                    <div class="form-group">
                                        <strong>Quantity</strong>  
                                        <input id="itemQty" type="number" class="form-control" onkeyup="if(this.value<1){this.value=1;}" onclick="if(this.value<1){this.value=1;}" placeholder="Enter qty of items" required />
                                    </div>
                                </div>

                                <div class="col-md-2 col-lg-2 col-xs-12">
                                    <button onclick="addItem()" class="btn btn-primary btn-block mg-t-20">Add Item</button>
                                </div>
                            </div>

                            @include('inc.flashmsg')

                            <form action="#." method="POST" id="sub_bill" >
                                @csrf
                                
                                <div class="table-responsive mg-t-10">
                                    <table class="table table-invoice border text-md-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th class="wd-5p">S/N</th>
                                                <th class="wd-20p">Type</th>
                                                <th class="wd-20p">Description</th>
                                                <th class="tx-center">QTY</th>
                                                <th class="tx-right">Unit Price</th>
                                                <th class="tx-right" width="20px">Total</th>
                                                <th class="tx-right"></th>
                                            </tr>
                                        </thead>

                                        <tbody id="show-items"></tbody>

                                        <tfoot>
                                            <tr>
                                                <th class="wd-5p"></th>
                                                <th class="wd-20p"></th>
                                                <th class="wd-20p"></th>
                                                <th class="tx-center"></th>
                                                <th class="tx-right">Grand Total</th>
                                                <th class="tx-right">
                                                    <strong id="gtotal"></strong>
                                                    <input type="hidden" id="totCost" name="totCost" class="form-control" required />
                                                    <input type="hidden" name="clientId" value="{{ $client['id'] }}" class="form-control" required />
                                                </th>
                                                <th class="tx-right"></th>
                                            </tr>

                                            <tr>
                                                <th class="wd-5p"></th>
                                                <th class="wd-20p"></th>
                                                <th class="wd-20p"></th>
                                                <th class="tx-center"></th>
                                                <th class="tx-right">Amount Paid</th>
                                                <th class="tx-right">
                                                    <input type="number" id="amtpaid" name="amtpaid" value="0" onkeyup="loadservItems();" onclick="loadservItems();" required />
                                                </th>
                                                <th class="tx-right"></th>
                                            </tr>

                                            <tr>
                                                <th class="wd-5p"></th>
                                                <th class="wd-20p"></th>
                                                <th class="wd-20p"></th>
                                                <th class="tx-center"></th>
                                                <th class="tx-right">Balance</th>
                                                <th class="tx-right">
                                                    <input type="number" id="totbal" name="totbal" value="0" onkeyup="if(this.value<0){this.value=0;}" onclick="if(this.value<0){this.value=0;}" readonly required />
                                                </th>
                                                <th class="tx-right"></th>
                                            </tr>
                                            
                                        </tfoot>
                                    </table>
                                
                                </div>
    
                                <button id="post_bill" type="button" class="btn btn-primary mg-t-40 float-left">Save Invoice</button>
                            </form>

                            <input type="hidden" value="{{ route('bills.add.save') }}" id="sub_bill_post_url">
                        </div>
                    </div>
                </div>
            </div>
            <!--/div-->

        </div>
        <!-- /row -->


        </div>
        <!-- Container closed -->
@endsection

@section('scripts')
    <!-- Bill items js-->
	<script src="{{ asset('js/special/bills-item-func.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            //alert('its working');
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            //save poll
            $('#post_bill').click(function () {
                //alert($('#totCost').val());
                
                if($('#totCost').val()!=0){
                    $('#post_bill').html('<i class="fa fa-refresh fa-spin"></i>');

                    $.ajax({
                        url: $('#sub_bill_post_url').val(),
                        method: "POST",
                        data: $('#sub_bill').serialize(),
                        success: function (data) {
                            //alert(data);
                            if (data.status === 'failed') {
                                toastr.error(data.message, 'Warning')
                            }
                            toastr.success(data.message, 'Success')

                            $('#post_bill').html('Transaction Approved')
                            $('#post_bill').hide();

                            //Clear billing form
                            sessionStorage.clear();

                            setTimeout(function () {
                                window.location.href = "/billings/view/" + data.billno
                            }, 5000)

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            let errorBody = jqXHR.responseJSON;
                            $.each(errorBody.errors, function (key, item) {
                                toastr.error(item, key)
                            });
                            $('#post_bill').html('Save Invoice')
                        },
                    });
                }else{
                    toastr.error('Please, add a bill.', 'Warning')
                }
                
            });

        });
   </script>

@endsection