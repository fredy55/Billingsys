@extends('admin.layouts.layout1')

<!-- Website title -->
@section('title', 'Service Category')

@section('contents')
    <!-- container -->
    <div class="container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Services</h4>
                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">
                        <a href="{{ route('service.list') }}">/ Service List</a>
                    </span>
                </div>
            </div>
            <div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <a href="{{ route('service.add') }}" type="button" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Add Service
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
                            <h4 class="card-title mg-b-0">.</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        
                    </div>
                    <div class="card-body">

                        @include('inc.flashmsg')

                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">S/N</th>
                                        <th class="border-bottom-0">Service Name</th>
                                        <th class="border-bottom-0">Category</th>
                                        <th class="border-bottom-0">Price</th>
                                        <th class="border-bottom-0">Date Created</th>
                                        <th class="border-bottom-0">Status</th>
                                        <th class="border-bottom-0"></th>
                                        <th class="border-bottom-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($services)>0)
                                       @for ($i=0; $i<count($services); ++$i) 
                                       <tr>
                                            <td>{{ $i+1 }}</td>
                                            <td>
                                                <a href="">
                                                    {{ $services[$i]->sname }}
                                                </a>
                                            </td>
                                            <td>{{ $services[$i]->category }}</td>
                                            <td>&#8358;{{ number_format($services[$i]->price, 2) }}</td>
                                            <td>{{ Carbon\Carbon::parse($services[$i]->created_at)->format('d-m-Y') }}</td>
                                            <td>{{ $services[$i]->IsActive==1?'Active':'Inactive' }}</td>
                                            
                                            <td>
                                                <a href="{{ route('service.edit',['id'=>$services[$i]->id]) }}"><i class="fas fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('service.delete',['id'=>$services[$i]->id]) }}" onclick="confirm('Are you sure you want to delete this record?');"><i class="fas fa-trash"></i></a>
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