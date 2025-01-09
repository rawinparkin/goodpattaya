@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Message All</h4>


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
                                    <th>Posted</th>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Customer Subject</th>
                                    <th>Customer Phone</th>
                                    <th>Action</th>

                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach($messages as $item)

                                @if( $item->is_read == false)
                                <tr style="background-color:#ffcc00;">
                                    @else
                                <tr>
                                    @endif


                                    <td> {{ $item->created_at->format('M d, Y') }} </td>
                                    <td> <a href="{{ route('read.message',$item->id) }}">{{ $item->customer_name }}</a>
                                    </td>
                                    <td> {{ $item->customer_email }} </td>
                                    <td> {{ $item->customer_subject }} </td>
                                    <td> {{ $item->customer_phone }}
                                    </td>
                                    <td>

                                        <a href="{{ route('delete.message',$item->id) }}" class="btn btn-danger sm"
                                            title="Delete Data" id="delete"> <i class="lni lni-trash"></i> </a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="mt-2 mb-3 text-center text-justify">
                            {{ $messages->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>


            </div> <!-- end col -->

            <div>
                <div style="width:50px;height:50px;background-color:#ffcc00;float:left;border-radius:50%;">
                </div><span style="position:relative;top:13px;left:10px;">ยังไม่ได้อ่าน</span>
            </div>



        </div> <!-- end row -->


    </div> <!-- container-fluid -->
</div>


@endsection