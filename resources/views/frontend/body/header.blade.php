@php
$route = Route::current()->getName();
$categories = App\Models\PropertyCategory::first()->get();

@endphp

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="site-navbar mt-4">
        <div class="container py-1">
            <div class="row align-items-center">
                <div class="col-8 col-md-8 col-lg-4">
                    <h1 class="mb-0">
                        <a href="{{ route('home') }}" class="text-white h2 mb-0">
                            <strong>Goodpattaya<span class="text-danger">.</span>
                            </strong>
                        </a>
                    </h1>
                </div>
                <div class="col-4 col-md-4 col-lg-8">
                    <nav class="site-navigation text-right text-md-right" role="navigation">

                        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#"
                                class="site-menu-toggle js-menu-toggle text-white"><span
                                    class="icon-menu h3"></span></a></div>

                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li class="{{ ($route == 'home')? 'active' : '' }}">
                                <a href="{{ route('home') }}">หน้าแรก</a>
                            </li>
                            <li class="{{ ($route == 'home.prop.sell')? 'active' : '' }}"><a
                                    href="{{ route('home.prop.sell') }}">ขาย</a></li>
                            <li class="{{ ($route == 'home.prop.rent')? 'active' : '' }}"><a
                                    href="{{ route('home.prop.rent') }}">เช่า</a></li>
                            <li class="has-children {{ ($route == 'home.prop.all')? 'active' : '' }}">
                                <a href="{{ route('home.prop.all') }}">อสังหาฯ</a>
                                <ul class="dropdown arrow-top">

                                    @foreach($categories as $item)

                                    <li><a href="{{ route('home.prop.cat', $item->id ) }}">{{ $item->name }}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </li>
                            <li class="{{ ($route == 'home.blog')? 'active' : '' }}"><a
                                    href="{{ route('home.blog') }}">บทความ</a></li>
                            <li class="{{ ($route == 'home.about')? 'active' : '' }}"><a
                                    href="{{ route('home.about') }}">เกี่ยวกับเรา</a></li>
                            <li class="{{ ($route == 'home.contact')? 'active' : '' }}"><a
                                    href="{{ route('home.contact') }}">ติดต่อ</a></li>
                        </ul>
                    </nav>
                </div>


            </div>
        </div>
    </div>
</div>