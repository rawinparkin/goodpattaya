@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Property Location All</h4>

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
                                    <th>Property Location Name</th>
                                    <th>Action</th>

                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach($proplocation as $item)
                                <tr>
                                    <td> {{ $i++}} </td>
                                    <td> {{ $item->name }} </td>

                                    <td>
                                        <a href="{{ route('edit.prop.location',$item->id) }}" class="btn btn-info sm"
                                            title="Edit Data"><i class="lni lni-pencil-alt"></i></a>

                                        <a href="{{ route('delete.prop.location',$item->id) }}"
                                            class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                class="lni lni-trash"></i> </a>

                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="mt-2 mb-3 text-center text-justify">
                            {{ $proplocation->links('vendor.pagination.bootstrap-4') }}
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <a href="{{ route('add.prop.location') }}" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Add
            Location</a>

    </div> <!-- container-fluid -->
</div>



@endsection