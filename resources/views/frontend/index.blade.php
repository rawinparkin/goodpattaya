@extends('frontend.main_master')
@section('main')

@section('title')
หน้าแรก | Goodpattaya - ซื้อบ้าน ขายบ้าน คอนโด ที่ดิน อาคารพานิชย์ พัทยา
@endsection

@section('meta')
<meta property="og:title" content="หน้าแรก | Goodpattaya - ซื้อบ้าน ขายบ้าน คอนโด ที่ดิน อาคารพานิชย์ พัทยา">
<meta property="og:image" content="{{ asset('frontend/assets/images/img_2.jpg') }}">
@endsection

@include('frontend.home.slide')

@include('frontend.home.searchbox')

@include('frontend.home.property')

@include('frontend.home.whyus')

@include('frontend.home.blog')

<!-- @include('frontend.home.team') -->



@endsection