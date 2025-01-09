@extends('admin.admin_master')
@section('admin')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>










<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">About Page Settings</h4> <br><br>

                        <form id="myForm" method="post" action="{{ route('update.about.page') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $abouts->id }}">
                            <input type="hidden" name="old_img" value="{{ $abouts->photo_name }}">

                            <div class="form-body mt-4">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="border border-3 p-4 rounded">

                                            <div class="form-group mb-3">
                                                <label for="title_input" class="form-label">Title</label>
                                                <input type="text" name="title" id="title_input" class="form-control"
                                                    placeholder="Enter about title" autocomplete="off"
                                                    value="{{ $abouts->title }}">
                                                @error('title')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>

                                            <div class="form-group  mb-3">
                                                <label for="my-editor" class="form-label">Description</label>
                                                <textarea name="description" style="height:200px;"
                                                    class="form-control">{{ $abouts->description }}</textarea>

                                                @error('description')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="title_why_input" class="form-label">Title Why Us</label>
                                                <input type="text" name="title_why" id="title_why_input"
                                                    class="form-control" placeholder="Enter title why us"
                                                    autocomplete="off" value="{{ $abouts->title_why }}">
                                                @error('title_why')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>

                                            <div class="form-group  mb-3">
                                                <label for="description_why_input"
                                                    class="form-label">Description</label>
                                                <textarea name="description_why" style="height:200px;"
                                                    id="description_why_input"
                                                    class="form-control">{{ $abouts->description_why }}</textarea>

                                                @error('description_why')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>









                                            <div class="form-group  mb-3">
                                                <label class="form-label" for="cover_photo_input">About Image</label>
                                                <input class="form-control" name="cover_photo" id="cover_photo_input"
                                                    type="file" onChange="mainThumbUrl(this)">
                                                <br>
                                                <img id="mainThumb" src="{{ asset($abouts->photo_name) }}"
                                                    style="width:100px; " />

                                            </div>







                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="border border-3 p-4 rounded">
                                            <div class="row g-3">


                                                <div class="form-group  col-md-12">
                                                    <label for="title_reason_1_input" class="form-label">Title Reason
                                                        1</label>
                                                    <input type="text" class="form-control" id="title_reason_1_input"
                                                        name="title_reason_1" autocomplete="off"
                                                        value="{{ $abouts->title_reason_1 }}">
                                                </div>

                                                <div class="form-group  col-md-12">
                                                    <label for="reason_1_input" class="form-label">Reason
                                                        1</label>
                                                    <textarea name="reason_1" style="height:120px;" id="reason_1_input"
                                                        class="form-control">{{ $abouts->reason_1 }}</textarea>
                                                </div>

                                                <div class="form-group  col-md-12">
                                                    <label for="title_reason_2_input" class="form-label">Title Reason
                                                        2</label>
                                                    <input type="text" class="form-control" id="title_reason_2_input"
                                                        name="title_reason_2" autocomplete="off"
                                                        value="{{ $abouts->title_reason_2 }}">
                                                </div>

                                                <div class="form-group  col-md-12">
                                                    <label for="reason_2_input" class="form-label">Reason
                                                        2</label>
                                                    <textarea name="reason_2" style="height:120px;" id="reason_2_input"
                                                        class="form-control">{{ $abouts->reason_2 }}</textarea>
                                                </div>

                                                <div class="form-group  col-md-12">
                                                    <label for="title_reason_3_input" class="form-label">Title Reason
                                                        3</label>
                                                    <input type="text" class="form-control" id="title_reason_3_input"
                                                        name="title_reason_3" autocomplete="off"
                                                        value="{{ $abouts->title_reason_3 }}">
                                                </div>

                                                <div class="form-group  col-md-12">
                                                    <label for="reason_3_input" class="form-label">Reason
                                                        3</label>
                                                    <textarea name="reason_3" style="height:120px;" id="reason_3_input"
                                                        class="form-control">{{ $abouts->reason_2 }}</textarea>
                                                </div>



                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <input type="submit" class="btn btn-primary px-4"
                                                            value="Update About Page" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                            </div>



                        </form>



                    </div>
                </div>
            </div> <!-- end col -->
        </div>



    </div>
</div>







<script type="text/javascript">
function mainThumbUrl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#mainThumb').attr('src', e.target.result).width(100);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>






@endsection