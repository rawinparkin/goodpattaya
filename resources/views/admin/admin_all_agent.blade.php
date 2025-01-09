@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Agents</h4>


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
                                    <th>Sl</th>
                                    <th>Agent Name</th>
                                    <th>Agent Email</th>
                                    <th>Action</th>

                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach($agents as $item)
                                <tr>
                                    <td> {{ $i++}} </td>
                                    <td> {{ $item->name  }} </td>
                                    <td> {{ $item->email  }} </td>



                                    <td>
                                        @if($item->id > 1)
                                        <a href="{{ route('delete.agent',$item->id) }}" class="btn btn-danger sm"
                                            title="Delete Agent" id="delete"> <i class="lni lni-trash"></i> </a>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="mt-2 mb-3 text-center text-justify">

                        </div>
                    </div>
                </div>


            </div> <!-- end col -->





        </div> <!-- end row -->



        <a href="{{ route('add.agent') }}" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Add
            Agent</a>

    </div> <!-- container-fluid -->
</div>


@endsection