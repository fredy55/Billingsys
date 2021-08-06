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
                    <h4 class="content-title mb-0 my-auto">Client Bills</h4>
                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Billing details</span>
                </div>
            </div>
            <div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <a href="{{ route('bills.list') }}" type="button" class="btn btn-primary btn-md">
                    <i class="fas fa-arrow-left"></i> Back to Billing List
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
                                        <h6>
                                           @if ($compinfo->img_url!=="nil")
                                              <img alt="avatar" src="{{ asset($compinfo->img_url) }}" alt="Company Logo" width="65px"/>
                                            @else
                                                <img alt="avatar" src="{{ asset('img/brand/logo.png') }}" alt="Company Logo" width="65px"/>
                                            @endif
                                            {{ $compinfo['ctname'] }}
                                        </h6>
                                        <address>{{ $compinfo['addressln1'] }}, {{ $compinfo['city'] }}, {{ $compinfo['state'] }}, {{ $compinfo['country'] }}</address>   
                                        <strong>Email:</strong> {{ $compinfo['email'] }}<br>
                                        <strong>Office Tel:</strong> {{ $compinfo['phone_no'] }}
                                    </p>
                                </div><!-- billed-from -->
                            </div>

                            @include('inc.flashmsg')

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
                            
                            <div class="table-responsive mg-t-10">
                                <table class="table table-invoice border text-md-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th class="wd-5p">S/N</th>
                                            <th class="wd-20p">Item</th>
                                            <th class="wd-20p">Description</th>
                                            <th class="tx-right">Unit Price</th>
                                            <th class="tx-center">QTY</th>
                                            <th class="tx-right">Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $i=0;
                                        @endphp

                                        @foreach ($billitems as $item)
                                            <tr>
                                            <td>{{ ++$i }}</td>
                                            <td class="item-title">{{ $item->sname }}</td>
                                            <td class="tx-14">{{ $item->description }}</td>
                                            <td class="tx-right">&#8358;{{ number_format($item->price,2) }}</td>
                                            <td class="tx-center">{{ $item->quantity }}</td>
                                            <td class="tx-right">&#8358;{{ number_format($item->total,2) }}</td>
                                       </tr>
                                        @endforeach
                                        
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th class="wd-5p"></th>
                                            <th class="wd-20p"></th>
                                            <th class="wd-20p"></th>
                                            <th class="tx-center"></th>
                                            <th class="tx-right">Grand Total</th>
                                            <td class="tx-right">&#8358;{{ number_format($bllinfo[0]->total_amt,2) }}</td>
                                        </tr>
                                        <tr>
                                            <th class="wd-5p"></th>
                                            <th class="wd-20p"></th>
                                            <th class="wd-20p"></th>
                                            <th class="tx-center"></th>
                                            <th class="tx-right">Amount Paid</th>
                                            <td class="tx-right">&#8358;{{ number_format($bllinfo[0]->amt_paid,2) }}</td>
                                        </tr>
                                         <tr>
                                            <th class="wd-5p"></th>
                                            <th class="wd-20p"></th>
                                            <th class="wd-20p"></th>
                                            <th class="tx-center"></th>
                                            <th class="tx-right">Balance</th>
                                            <td class="tx-right">&#8358;{{ number_format($bllinfo[0]->balance,2) }}</td>
                                        </tr>
                                    </tfoot>
                                </table><br />

                                <table class="table table-invoice border text-md-nowrap mb-0">
                                    
                                        <tr>
                                            <th>
                                                @if ($bllinfo[0]->balance==0)
                                                    <a href="{{ route('bills.receipt.create', ['id'=>$bllinfo[0]->bill_no]) }}" type="button" class="btn btn-primary btn-md" target="_blank">
                                                        <i class="fa fa-file"></i> Generate Receipt
                                                    </a>
                                                @else
                                                    <a href="{{ route('bills.invoice.create', ['id'=>$bllinfo[0]->bill_no]) }}" type="button" class="btn btn-primary btn-md" target="_blank">
                                                        <i class="fa fa-file"></i> Generate Invoice
                                                    </a>  
                                                @endif
                                                
                                            </th>

                                            <th>
                                               @if ($bllinfo[0]->balance>0)
                                                <a href="#modaldemo8" data-effect="effect-flip-vertical" data-toggle="modal" type="button" class="btn btn-primary btn-md">
                                                    <i class="fa fa-credit-card"></i> Make Payment
                                                </a>
                                               @endif
                                            </th>
                                            <th colspan="6"></th>
                                            <th>
                                                <a href="#" type="button" class="btn btn-primary btn-md">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </th>
                                            <th>
                                                <a href="{{ route('bills.invoice.delete', ['id'=>$bllinfo[0]->bill_no]) }}" type="button" onclick="confirm('Do you want to delete this record?')" class="btn btn-danger btn-md">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </th>
                                        </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/div-->

        </div>
        <!-- /row -->


        </div>
        <!-- Container closed -->

        <!-- Modal effects -->
		<div class="modal" id="modaldemo8" data-backdrop="static">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">
                            <img src="{{ asset('img/brand/logo.png') }}" alt="Company Logo" />
                        </h6>
						<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
                <form method="POST" action="{{ route('bills.pay.update') }}">
					
                    <div class="modal-body">
						<h4 style="text-align: center;">Invoice Payment (Ref: #{{ $bllinfo[0]->bill_no }})</h4>
						<p>
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Grand Total</label> 
                                        <input name="totgrand" id="totgrand" type="number" value="{{ $bllinfo[0]->total_amt }}" class="form-control" readonly />
                                        <input name="id" type="hidden" value="{{ $bllinfo[0]->id }}" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Total Payment</label> 
                                        <input name="totpay" id="totpay" type="number" value="{{ $bllinfo[0]->amt_paid }}" class="form-control" readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Total Balance</label> 
                                        <input name="baltot" id="baltot" type="number" value="{{ $bllinfo[0]->balance }}" class="form-control" readonly />
                                        <input id="baltot2" type="hidden" value="{{ $bllinfo[0]->balance }}" class="form-control" readonly />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Amount to Pay</label> 
                                        <input name="payamt" id="payamt" type="number" onkeyup="paymentComp();" onchange="paymentComp(this.value);" class="form-control" placeholder="e.g. #2,300.00" required />
                                    </div>
                                </div>
                            </div>
                        </p>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn ripple btn-primary" type="button">Save Payment</button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
					</div>
                </form>
				</div>
			</div>
		</div>
		<!-- End Modal effects-->


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
                                window.location.href = "/billings/view/" + data.clientId
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