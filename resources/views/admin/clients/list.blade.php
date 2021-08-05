@extends('admin.layouts.layout1')

<!-- Website title -->
@section('title', 'Client Info')

@section('contents')
    <!-- container -->
    <div class="container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Client Info</h4>
                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">
                        <a href="{{ route('clients.list') }}">/ Client List</a>
                    </span>
                </div>
            </div>
            <div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <a href="{{ route('clients.add') }}" type="button" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Add Client
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
                                        <th class="border-bottom-0">Client Name</th>
                                        <th class="border-bottom-0">Email</th>
                                        <th class="border-bottom-0">Phone</th>
                                        <th class="border-bottom-0">City</th>
                                        <th class="border-bottom-0">State</th>
                                        <th class="border-bottom-0">Date Created</th>
                                        <th class="border-bottom-0">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($clients)>0)
                                       @for ($i=0; $i<count($clients); ++$i) 
                                       <tr>
                                            <td>{{ $i+1 }}</td>
                                            <td>
                                                <a href="{{ route('clients.details', ['id'=>$clients[$i]->id]) }}">
                                                    {{ $clients[$i]->ctname }}
                                                </a>
                                            </td>
                                            <td>{{ $clients[$i]->email }}</td>
                                            <td>{{ $clients[$i]->phone_no }}</td>
                                            <td>{{ $clients[$i]->city }}</td>
                                            <td>{{ $clients[$i]->state }}</td>
                                            <td>{{ Carbon\Carbon::parse($clients[$i]->created_at)->format('d-m-Y') }}</td>
                                            <td>{{ $clients[$i]->IsActive==1?'Active':'Inactive' }}</td>
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