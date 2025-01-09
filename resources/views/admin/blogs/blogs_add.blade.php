@extends('admin.admin_master')
@section('admin')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/trumbowyg/trumbowyg.min.css') }}">
<script src="{{ asset('backend/assets/plugins/trumbowyg/trumbowyg.min.js') }}"></script>





<style type="text/css">
    .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: #afa939;
        font-weight: 700px;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>




<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Blog Page</h4>


                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">



                        <form method="post" action="{{ route('store.blog') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category
                                    Name</label>
                                <div class="col-sm-10">
                                    <select name="blog_category_id" class="form-select" aria-label="Default select example">

                                        @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->blog_category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title </label>
                                <div class="col-sm-10">
                                    <input name="blog_title" class="form-control" type="text" id="example-text-input">

                                    @error('blog_title')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags </label>
                                <div class="col-sm-10">
                                    <input name="blog_tags" value="home,tech" class="form-control" type="text" data-role="tagsinput">
                                </div>
                            </div>
                            <!-- end row -->



                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description
                                </label>
                                <div class="col-sm-10">

                                    <textarea id="my-editor" name="blog_description"></textarea>
                                    @error('blog_description')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image </label>
                                <div class="col-sm-10">
                                    <input name="blog_image" class="form-control" type="file" id="image">
                                    @error('blog_image')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap" width="200px">
                                </div>
                            </div>
                            <!-- end row -->
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Blog Data">
                        </form>



                    </div>
                </div>
            </div> <!-- end col -->
        </div>



    </div>
</div>




<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


<script>
    $('#my-editor').trumbowyg();
</script>




@endsection