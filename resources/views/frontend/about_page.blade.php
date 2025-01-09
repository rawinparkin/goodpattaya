@extends('frontend.main_master')
@section('main')

@section('title')
เกี่ยวกับเรา | Goodpattaya
@endsection

@section('meta')
<meta property="og:title" content="เกี่ยวกับเรา | Goodpattaya - ซื้อบ้าน ขายบ้าน คอนโด ที่ดิน อาคารพานิชย์ พัทยา">
<meta property="og:image" content="{{ asset('frontend/assets/images/img_2.jpg') }}">
@endsection

@php
$slides = App\Models\Property::where('is_featured',1)->inRandomOrder()->limit(1)->get()
@endphp

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('{{ asset($slides[0]->cover_photo) }}');" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">เกี่ยวกับเรา</h1>
            </div>
        </div>
    </div>
</div>


<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset($abouts->photo_name) }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-5 ml-auto" data-aos="fade-up" data-aos-delay="200">
                <div class="site-section-title">
                    <h2>{{ $abouts->title }}</h2>
                </div>
                <p class="lead">{{ $abouts->description }}</p>

            </div>
        </div>
    </div>
</div>




<!-- @include('frontend.home.team') -->

<div class="site-section">
    <div class="container">

        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <div class="site-section-title">
                    <h2>{{ $abouts->title_why }}</h2>
                </div>
                <p>{{ $abouts->description_why }}</p>
            </div>
        </div>

        <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
            <div class="col-md-8">
                <div class="accordion unit-8" id="accordion">
                    <div class="accordion-item">
                        <h3 class="mb-0 heading">
                            <a class="btn-block" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">{{ $abouts->title_reason_1 }}<span class="icon"></span></a>
                        </h3>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="body-text">
                                <p>{{ $abouts->reason_1 }}</p>
                            </div>
                        </div>
                    </div> <!-- .accordion-item -->

                    <div class="accordion-item">
                        <h3 class="mb-0 heading">
                            <a class="btn-block" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">{{ $abouts->title_reason_2 }}<span class="icon"></span></a>
                        </h3>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="body-text">
                                <p>{{ $abouts->reason_2 }}</p>
                            </div>
                        </div>
                    </div> <!-- .accordion-item -->

                    <div class="accordion-item">
                        <h3 class="mb-0 heading">
                            <a class="btn-block" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">{{ $abouts->title_reason_3 }}<span class="icon"></span></a>
                        </h3>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="body-text">
                                <p>{{ $abouts->reason_3 }}</p>
                            </div>
                        </div>
                    </div> <!-- .accordion-item -->



                </div>
            </div>
        </div>

    </div>
</div>



@endsection