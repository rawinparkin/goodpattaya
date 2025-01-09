 @php
 $caontacts = App\Models\ContactPage::find(1);
 $abouts =App\Models\AboutPage::find(1);

 @endphp

 <footer class="site-footer">
     <div class="container">
         <div class="row">
             <div class="col-lg-4">
                 <div class="mb-5">
                     <h3 class="footer-heading mb-4">เกี่ยวกับเรา</h3>
                     <p>{{ $abouts->description }}
                     </p>
                 </div>



             </div>
             <div class="col-lg-4 mb-5 mb-lg-0">
                 <div class="row mb-5">
                     <div class="col-md-12">
                         <h3 class="footer-heading mb-4">แผนที่เว็บไซต์</h3>
                     </div>
                     <div class="col-md-6 col-lg-6">
                         <ul class="list-unstyled">
                             <li><a href="{{ route('home') }}">หน้าแรก</a></li>
                             <li><a href="{{ route('home.prop.sell') }}">ซื้อบ้าน</a></li>
                             <li><a href="{{ route('home.prop.rent') }}">ให้เช่าบ้าน</a></li>
                             <li><a href="{{ route('home.prop.all') }}">อสังหาฯ</a></li>
                         </ul>
                     </div>
                     <div class="col-md-6 col-lg-6">
                         <ul class="list-unstyled">
                             <li><a href="{{ route('home.about') }}">เกี่ยวกับเรา</a></li>

                             <li><a href="{{ route('home.contact') }}">ติดต่อ</a></li>

                         </ul>
                     </div>
                 </div>


             </div>

             <div class="col-lg-4 mb-5 mb-lg-0">
                 <h3 class="footer-heading mb-4">ติดตามเรา</h3>

                 <div>
                     <a href="{{ $caontacts->facebook }}" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                     <a href="{{ $caontacts->instagram }}" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                 </div>



             </div>

         </div>
         <div class="row pt-5 mt-5 text-center">
             <div class="col-md-12">
                 <p>
                     <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                     Copyright &copy;
                     <script>
                         document.write(new Date().getFullYear());
                     </script> All rights reserved | Goodpattaya
                 </p>
             </div>

         </div>
     </div>
 </footer>