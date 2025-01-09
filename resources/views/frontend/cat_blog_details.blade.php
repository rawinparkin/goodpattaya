@extends('frontend.main_master')
@section('main')

@section('title')
บทความเกี่ยวกับ{{ $categoryname->blog_category }} | Goodpattaya
@endsection

@section('meta')
<meta property="og:title" content="บทความเกี่ยวกับ{{ $categoryname->blog_category }} | Goodpattaya - ซื้อบ้าน ขายบ้าน คอนโด ที่ดิน อาคารพานิชย์ พัทยา">
<meta property="og:image" content="{{ asset('frontend/assets/images/img_2.jpg') }}">
@endsection

@php
$slides = App\Models\Property::where('is_featured',1)->inRandomOrder()->limit(1)->get()
@endphp



<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('{{ asset($slides[0]->cover_photo) }}');" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2" style="font-size:32px;">บทความเกี่ยวกับ{{ $categoryname->blog_category }}</h1>

                <p class="linktree mt-3"><span class="mr-2"><a href="{{ route('home') }}">หน้าแรก > </a></span> <span class="mr-2"><a href="{{ route('home.blog') }}">บทความ ></a></span>
                    <span>{{ $categoryname->blog_category }}<i class="ion-ios-arrow-forward"></i></span>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">


            @foreach($blogpost as $item)


            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <a href="{{ route('blog.details',$item->id) }}"><img src="{{ asset($item->blog_image) }}" alt="Image" class="img-fluid"></a>
                <div class="p-4 bg-white">
                    <span class="d-block text-secondary small text-uppercase">{{ $item->created_at->format('M d, Y') }}</span>
                    <h2 class="h5 text-black mb-3"><a href="{{ route('blog.details',$item->id) }}">{{ $item->blog_title }}</a></h2>

                    <p>{!! Str::words(strip_tags($item->blog_description), 2, '...') !!}</p>
                </div>
            </div>

            @endforeach



        </div>

        <div class="row" data-aos="fade-up">
            <div class="col-md-12 text-center">

                {{ $blogpost->links('vendor.pagination.custom') }}

            </div>
        </div>

    </div>
</div>








@endsection