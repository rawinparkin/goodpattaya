@extends('frontend.main_master')
@section('main')

@section('title')
ติดต่อ | Goodpattaya
@endsection

@section('meta')
<meta property="og:title" content="ติดต่อ | Goodpattaya - ซื้อบ้าน ขายบ้าน คอนโด ที่ดิน อาคารพานิชย์ พัทยา">
<meta property="og:image" content="{{ asset('frontend/assets/images/img_2.jpg') }}">
@endsection

@php
$slides = App\Models\Property::where('is_featured',1)->inRandomOrder()->limit(1)->get()
@endphp

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('{{ asset($slides[0]->cover_photo) }}');" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">ติดต่อเรา</h1>
            </div>
        </div>
    </div>
</div>


<div class="site-section">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-lg-8 mb-5">





                <form id="myForm" method="post" action="{{ route('store.message') }}" class="p-5 bg-white border">
                    @csrf

                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="fullname">ชื่อ</label>
                            <input type="text" name="customer_name" class="form-control" placeholder="ชื่อ">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="email">อีเมล์</label>
                            <input type="email" name="customer_email" class="form-control" placeholder="อีเมล์">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="email">เรื่อง</label>
                            <input type="text" name="customer_subject" class="form-control" placeholder="เรื่อง">
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="message">ข้อความ</label>
                            <textarea name="customer_message" cols="30" rows="5" class="form-control" placeholder="กรอกข้อสงสัย..."></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="ส่งข้อความ" class="btn btn-primary  py-2 px-4 rounded-0">
                        </div>
                    </div>


                </form>
            </div>

            <div class="col-lg-4">
                <div class="p-4 mb-3 bg-white">
                    <h3 class="h6 text-black mb-3 text-uppercase">ติดต่อสอบถาม</h3>
                    <p class="mb-0 font-weight-bold">ที่อยู่</p>
                    <p class="mb-4">{{ $contacts->address }}</p>

                    <p class="mb-0 font-weight-bold">โทรศัพท์</p>
                    <p class="mb-4">{{ $contacts->phone }}</p>

                    <p class="mb-0 font-weight-bold">อีเมล์</p>
                    <p class="mb-0">{{ $contacts->email }}</p>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7">
                <div class="site-section-title text-center">
                    <h2>แผนที่บริษัท</h2>

                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-12 mappic">
                <a href="{{ $contacts->map_link }}">
                    <img src="{{ asset($contacts->map) }}" />
                </a>
            </div>



        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                customer_name: {
                    required: true,
                },
                customer_email: {
                    required: true,
                },
                customer_subject: {
                    required: true,
                },
                customer_message: {
                    required: true,
                },
            },
            messages: {
                customer_name: {
                    required: 'Please Enter Name',
                },
                customer_email: {
                    required: 'Please Enter Email',
                },
                customer_subject: {
                    required: 'Please Enter Subject',
                },
                customer_message: {
                    required: 'Please Enter Message',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>


@endsection