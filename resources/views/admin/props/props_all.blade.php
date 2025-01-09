@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Properties All</h4>


                </div>
            </div>

            <div class="col-12 mt-3 mb-2">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <form id="myForm" method="get" action="{{ route('search.prop.id') }}">
                        @csrf

                        <input type="text" name="search_id" class="form-control " placeholder="search property by id"
                            autocomplete="off">
                        @error('search_id')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <input type="submit" class="btn btn-primary px-4 float-left mt-2" value="Search" />

                    </form>
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
                                    <th>Id</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Owner</th>
                                    <th>Image</th>
                                    <th>Action</th>

                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach($props as $item)

                                @if( $item->is_active == null || $item->is_active == 0)
                                <tr style="background-color:#ffcc00;">
                                    @else
                                <tr>
                                    @endif


                                    <td> {{ $item->id }} </td>
                                    <td> {{ $item['category']['name'] }} </td>
                                    <td> <a href="{{ route('prop.details',$item->id) }}"
                                            target="_blank">{{ $item['title']['title'] }}</a> </td>
                                    <td> {{ $item['owner']['owner_name'] }} - {{ $item['owner']['owner_phone'] }}</td>

                                    <td> <img src="{{ asset($item->cover_photo) }}" style="width: 70px; ">
                                    </td>

                                    <td>
                                        <a href="{{ route('edit.props', $item->id) }}" class="btn btn-info sm"
                                            title="Edit Data"><i class="lni lni-pencil-alt"></i> </a>

                                        <a href="{{ route('delete.props', $item->id) }}" class="btn btn-danger sm"
                                            title="Delete Data" id="delete"> <i class="lni lni-trash"></i> </a>

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

            <div>
                <div style="width:50px;height:50px;background-color:#ffcc00;float:left;border-radius:50%;" class="mb-3">
                </div><span style="position:relative;top:13px;left:10px;">Not Active</span>
            </div>



        </div> <!-- end row -->



        <a href="{{ route('add.prop') }}" class="btn btn-primary btn-lg mb-3" role="button" aria-pressed="true">Add
            Property</a>

    </div> <!-- container-fluid -->
</div>






@endsection