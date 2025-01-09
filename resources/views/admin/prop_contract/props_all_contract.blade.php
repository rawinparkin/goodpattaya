@extends('admin.admin_master')
@section('admin')

@php

$monafter = Carbon\Carbon::now()->addMonthsNoOverflow(1);
$curentTime = Carbon\Carbon::now();
@endphp


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Properties All</h4>


                </div>
            </div>

        </div>
        <!-- end page title -->

        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"></h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Property Id</th>
                                    <th>Customer on Contract</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Property</th>
                                    <th>Action</th>

                            </thead>




                            <tbody>
                                @php($i = 1)

                                @foreach($props as $item)


                                @if($curentTime > $item->end)
                                <tr style="background-color:red;">
                                    @elseif($monafter > $item->end && $item->end > $curentTime)
                                <tr style="background-color:#ffcc00;">
                                    @else
                                <tr>
                                    @endif

                                    <td> {{ $item->property_id }} </td>
                                    <td> {{ $item->customer_name }} - {{ $item->customer_phone }} </td>



                                    <td> {{ date('d-M-Y', strtotime($item->start)) }}</td>
                                    <td> {{ date('d-M-Y', strtotime($item->end)) }} </td>

                                    <td> <a href="{{ route('prop.details',$item->property_id) }}" target="_blank"><img
                                                src="{{ asset($item['propertyInfo']['cover_photo']) }}"
                                                width="100px" /></a> </td>

                                    <td>
                                        <a href="{{ route('edit.props.contract', $item->id) }}" class="btn btn-info sm"
                                            title="Edit Data"><i class="lni lni-pencil-alt"></i> </a>

                                        <a href="{{ route('delete.props.contract', $item->id) }}"
                                            class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                class="lni lni-trash"></i> </a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="mt-2 mb-3 text-center text-justify">
                            {{ $props->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>


            </div> <!-- end col -->

            <div style="width:200px;">
                <div style="width:50px;height:50px;background-color:#ffcc00;float:left;border-radius:50%;" class="mb-3">
                </div><span style="position:relative;top:13px;left:10px;">Contract Expiring</span>


            </div>
            <div style="width:200px;">
                <div style="width:50px;height:50px;background-color:red;float:left;border-radius:50%;" class="mb-3">
                </div><span style="position:relative;top:13px;left:10px;">Contract Expired</span>
            </div>



        </div> <!-- end row -->



        <a href="{{ route('add.prop.contract') }}" class="btn btn-primary btn-lg mb-3" role="button"
            aria-pressed="true">Add
            Contract</a>

    </div> <!-- container-fluid -->
</div>






@endsection