<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('logo/home.svg') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Goodpattaya</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Application</div>
            </a>
            <ul>
                <li> <a href="{{ route('dashboard') }}"><i class="bx bx-right-arrow-alt"></i>Dashboard</a>
                </li>
                <li> <a href="{{ route('all.messages') }}"><i class="bx bx-right-arrow-alt"></i>All Messages</a>
                </li>
                <li> <a href="{{ route('all.prop') }}"><i class="bx bx-right-arrow-alt"></i>All Property
                    </a>
                </li>
                <li> <a href="{{ route('all.prop.featured') }}"><i class="bx bx-right-arrow-alt"></i>Property
                        Featured</a>
                </li>
                <li> <a href="{{ route('all.prop.location') }}"><i class="bx bx-right-arrow-alt"></i>Property
                        Location</a>
                </li>
                <li> <a href="{{ route('all.prop.category') }}"><i class="bx bx-right-arrow-alt"></i>Property
                        Category</a>
                </li>
                <li> <a href="{{ route('all.prop.contract') }}"><i class="bx bx-right-arrow-alt"></i>Property
                        Contract</a>
                </li>

                <li> <a href="{{ route('all.blog') }}"><i class="bx bx-right-arrow-alt"></i>All Blogs</a>
                </li>
                <li> <a href="{{ route('all.blog.category') }}"><i class="bx bx-right-arrow-alt"></i>Blog Category</a>
                </li>



                <li> <a href="{{ route('about.page.setting') }}"><i class="bx bx-right-arrow-alt"></i>About Page
                        Setting</a>
                </li>

                <li> <a href="{{ route('contact.page.setting') }}"><i class="bx bx-right-arrow-alt"></i>Contact Page
                        Setting</a>
                </li>



            </ul>
        </li>



    </ul>
    <!--end navigation-->
</div>