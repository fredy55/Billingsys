@extends('admin.layouts.layout1')

<!-- Website title -->
@section('title', 'Company Info')

@section('contents')
    <!-- container -->
    <div class="container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Company Info</h4>
                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">
                        <a href="{{ route('company.list') }}">/ Company List</a>
                    </span>
                </div>
            </div>
            <div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <a href="{{ route('company.add') }}" type="button" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Add Company
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
                                        <th class="border-bottom-0">Company Name</th>
                                        <th class="border-bottom-0">Email</th>
                                        <th class="border-bottom-0">Phone</th>
                                        <th class="border-bottom-0">City</th>
                                        <th class="border-bottom-0">State</th>
                                        <th class="border-bottom-0">Date Created</th>
                                        <th class="border-bottom-0">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($compinfo)>0)
                                       @for ($i=0; $i<count($compinfo); ++$i) 
                                       <tr>
                                            <td>{{ $i+1 }}</td>
                                            <td>
                                                <a href="{{ route('company.details', ['id'=>$compinfo[$i]->id]) }}">
                                                    {{ $compinfo[$i]->ctname }}
                                                </a>
                                            </td>
                                            <td>{{ $compinfo[$i]->email }}</td>
                                            <td>{{ $compinfo[$i]->phone_no }}</td>
                                            <td>{{ $compinfo[$i]->city }}</td>
                                            <td>{{ $compinfo[$i]->state }}</td>
                                            <td>{{ Carbon\Carbon::parse($compinfo[$i]->created_at)->format('d-m-Y') }}</td>
                                            <td>{{ $compinfo[$i]->IsActive==1?'Active':'Inactive' }}</td>
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