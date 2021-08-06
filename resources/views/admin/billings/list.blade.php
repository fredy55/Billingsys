@extends('admin.layouts.layout1')

<!-- Website title -->
@section('title', 'Client Billing Information')

@section('contents')
    <!-- container -->
    <div class="container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Billing Info</h4>
                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">
                        <a href="{{ route('bills.list') }}">/ Billing List</a>
                    </span>
                </div>
            </div>
            <div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <a href="{{ route('clients.list') }}" type="button" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Add Bills
                </a>
            </div>
        </div>
        <!-- breadcrumb -->

        <!-- row opened -->
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0"></h4>
                            {{-- <i class="mdi mdi-dots-horizontal text-gray"></i> --}}
                        </div>
                        
                    </div>
                    <div class="card-body">

                        @include('inc.flashmsg')

                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">S/N</th>
                                        <th class="border-bottom-0">Bill N<u>o</u></th>
                                        <th class="border-bottom-0">Client Name</th>
                                        <th class="border-bottom-0">Total Amount</th>
                                        <th class="border-bottom-0">Date Created</th>
                                        <th class="border-bottom-0">Status</th>
                                        <th class="border-bottom-0"></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="border-bottom-0">S/N</th>
                                        <th class="border-bottom-0">Bill N<u>o</u></th>
                                        <th class="border-bottom-0">Client Name</th>
                                        <th class="border-bottom-0">Total Amount</th>
                                        <th class="border-bottom-0">Date Created</th>
                                        <th class="border-bottom-0">Status</th>
                                        <th class="border-bottom-0"></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if (count($billinfo)>0)
                                       @for ($i=0; $i<count($billinfo); ++$i) 
                                       <tr>
                                            <td>{{ $i+1 }}</td>
                                            <td>{{ $billinfo[$i]->bill_no }}</td>
                                             <td>
                                                <a href="{{ route('clients.details', ['id'=>$billinfo[$i]->client_id ]) }}">
                                                    {{ $billinfo[$i]->clients['ctname'] }}
                                                </a>
                                            </td>
                                            <td>&#8358;{{ number_format($billinfo[$i]->total_amt,2) }}</td>
                                            <td>{{ Carbon\Carbon::parse($billinfo[$i]->created_at)->format('d-m-Y') }}</td>
                                            <td>{{ $billinfo[$i]->IsActive==1?'Approved':'Pending' }}</td>
                                            <td>
                                                <a href="{{ route('bills.details', ['id'=>$billinfo[$i]->bill_no]) }}"><i class="fas fa-search"></i> Details</a>
                                            </td>
                                        </tr> 
                                       @endfor
                                    @endif
                                </tbody>
                            </table>
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
    
@endsection