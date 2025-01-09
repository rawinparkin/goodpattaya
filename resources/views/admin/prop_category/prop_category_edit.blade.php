@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Property Category Page </h4> <br><br>

                        <form method="post" action="{{ route('update.prop.category',$propcategory->id) }}">
                            @csrf


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Property Category
                                    Name</label>
                                <div class="col-sm-10">
                                    <input name="prop_category" class="form-control" type="text"
                                        value="{{ $propcategory->name }}" id="example-text-input">
                                    @error('prop_category')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->


                            <input type="submit" class="btn btn-info waves-effect waves-light"
                                value="Update Property Category">
                        </form>


                    </div>
                </div>
            </div> <!-- end col -->
        </div>



    </div>
</div>




@endsection