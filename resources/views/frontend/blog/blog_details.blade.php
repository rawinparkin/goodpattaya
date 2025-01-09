@extends('frontend.main_master')
@section('main')

@section('title')
{{$blogs->blog_title}} | Goodpattaya
@endsection

@php
$slides = App\Models\Property::where('is_featured',1)->inRandomOrder()->limit(1)->get()
@endphp

@section('meta')
<meta property="og:title" content="{{$blogs->blog_title}} | Goodpattaya">
<meta property="og:image" content="{{ asset($blogs->blog_image) }}">
@endsection

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('{{ asset($slides[0]->cover_photo) }}');" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2" style="font-size:32px;">{{ $blogs->blog_title }}</h1>

                <p class="linktree mt-3"><span class="mr-2"><a href="{{ route('home') }}">หน้าแรก > </a></span> <span class="mr-2"><a href="{{ route('home.blog') }}">บทความ ></a></span>
                    <span>{{ $blogs->blog_title }}<i class="ion-ios-arrow-forward"></i></span>
                </p>
            </div>
        </div>
    </div>
</div>


<div class="site-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                <div>
                    <div><img src="{{ asset($blogs->blog_image) }}" alt="Image" class="img-fluid"></div>
                </div>


                <div class="bg-white property-body ">
                    <h2 class="h4 text-black">{{ $blogs->blog_title }}</h2>
                    <p>{!! $blogs->blog_description !!}</p>

                </div>



            </div> <!-- .col-md-8 -->

            <div class="col-lg-4">

                <div class="bg-white widget border rounded">

                    <h3 class="h4 text-black  mb-3">บทความตามหัวข้อ</h3>

                    @foreach($categories as $cat)
                    <div class="linkblogcat ">
                        · <a href="{{ route('category.blog',$cat->id) }}">{{ $cat->blog_category  }} </a>
                        <!-- <span class="icon-angle-right movetoright"></span> -->
                    </div>
                    @endforeach


                </div>

                <div class="bg-white widget border rounded ">

                    <h3 class="h4 text-black mb-4">บทความล่าสุด</h3>

                    @foreach($allblogs as $all )
                    <div class="linkblogcat">
                        <div class="small-picture">
                            <a href="{{ route('blog.details',$all->id) }}"><img src="{{ asset($all->blog_image) }}" /></a>
                        </div>

                        <div class="mt-2 mb-2">
                            <a href="{{ route('blog.details',$all->id) }}">{{ $all->blog_title }}</a>
                            <p style="font-size:12px;"><span class="icon-calendar"></span>
                                {{ $all->created_at->format('M d, Y') }}
                            </p>
                        </div>
                    </div>
                    @endforeach


                </div>



            </div>






        </div>
    </div>
</div>








@endsection