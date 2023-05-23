@section('title', clean(trans('user::auth.home')))
@extends('user::admin.auth.layout')
@section('content')


<!-- ======= Header ======= -->
<header id="header">
    <div class="row"  style="padding:5px;background-color: #6610f2;margin-top: -19px;margin-bottom:10px;">
      <div class="col-md-12" style="text-align: left; color:#fff;"></div>
        <div class="col-md-12" style="text-align: right;">
            @foreach (supported_locales() as $locale => $language)
                <a class="btn btn-xs btn-border btn-round" href="{{ localized_url($locale) }}" style="color: #fff;font-size:14px;">{{ clean($language['name']) }}</a>
            @endforeach
        </div>
      </div>
      <div class="container d-flex align-items-center justify-content-between">
      <div class="col-lg-1 col-4 text-left" >
      <a href="{{ route('admin.front') }}" class="logo"><img src="/assets/img/logo_image.png" alt="" class="img-fluid" style="max-width:90%;"></a>
    </div>
    <div class="col-lg-9 col-12 text-left" style="border-left: 2px solid #a5a5a5;padding-left:10px;">
    <!-- <h2 style="color:#1338BE"> Auto Annexure-II</h2> -->

        <h2 style="color:#d70e2d"> Slum Rehabilitation Authority, Mumbai</h2>
        <!-- <h4 style="color:#d70e2d">Slum Rehabilitation Authority, Mumbai<h4/> -->
        <!-- <h5>Government of Maharashtra<h5/> -->
        <h6>Government of Maharashtra</h6>
    </div>
      <!-- Uncomment below if you prefer to use text as a logo -->
      <!-- <h1 class="logo"><a href="index.html">Butterfly</a></h1> -->
      <div class="col-lg-2 col-12 text-right">
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="https://www.maharashtra.gov.in/" target="_blank"><img src="/assets/img/mha_logo.png" class="mha_logs" onclick="return sitevisit();" alt="maharashtra.gov.in" title="maharashtra.gov.in"></a></li>
          <li><a href="https://www.india.gov.in/" target="_blank"><img src="/assets/img/embleem.png" class="emblem_logo" onclick="return sitevisit();" alt="Emblem" title="Emblem"></a></li>
          
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center" >
            <h1>Welcome to Auto annexure - II</h1>
            <h2>Slum Rehabilitation Authority (SRA) has undertaken technology driven GIS enabled Door-to-Door field survey of slum huts using Biometric enabled tablet device.</h2><br/>
            <h2>Post survey gathered documents needs to be verified to finalize the eligibility of the slum dweller in the defined process (i.e. Annexure -II) as per Maharashtra Slum Areas (Improvement, Clearance and Redevelopment) Act, 1971. </h2><br/>
            <h2>Objective of developing ‘Auto Annexure-II’ application is to undertake the creation of an intelligence that shall assist SRA in the generation of Annexure II through data verification and software automation which will act as ‘Single Window’.</h2> 
            <h2>  Key activities for achieving Auto Annexure-II are</h2>
            <h2> •	Data aggregation platform from various data sources.<br>
                •	Carrying out data extraction and record generation.<br>
                •	Creation of software-based algorithms for analyzing data along with suggestions.<br>
                •	Automation of evidence based Annexure-II Generation.<br>           
            </h2>
            <br>
            <h2>Proposed Data Integrations are as follow for Annexure-II.</h2>

            <br>
            <!-- <h2>Domain Data for verification of slum developers.</h2> -->
            <img src="/assets/img/latestimage.jpg" alt="Image description">
            <br>
        </div>
        <div class="col-lg-3 order-1 order-lg-2 team section-bg">
          <!-- start-->
          <div style="text-align: center;"><a href="{{ route('admin.login') }}" class="btn-get-started scrollto">Get Started</a></div><br/> 
          <div class="icon-box" style="background-color: #ee8d27;padding:2px; "><br/>
              <div class="icon" style="text-align: center;"><img src="/assets/img/EknathShinde.jpeg" alt="Shri. Satish Lokhande, IAS" title="Shri. Satish Lokhande, IAS" style="border-radius:50%; width:100px;"></div>
              <h4 class="title" style="text-align: center;color: #fff;">Shri Eknath Shinde</h4>
              <p class="description" style="text-align: center;color: #fff;">Hon'ble Chief Minister</p>
          </div>
          <br/>
          <div class="icon-box" style="background-color: #1ea297;padding:2px; "><br/>
              <div class="icon" style="text-align: center;"><img src="/assets/img/DevendraFadnavis.jpeg" alt="Shri. Satish Lokhande, IAS" title="Shri. Satish Lokhande, IAS" style="border-radius:50%; width:100px;"></div>
              <h4 class="title" style="text-align: center;color: #fff;">Shri Devendra Fadnavis</h4>
              <p class="description" style="text-align: center;color: #fff;">Hon'ble Deputy CM</p>
            </div>
            <br/>
          <div class="icon-box" style="background-color: #d84239;padding:2px; "><br/>
              <div class="icon" style="text-align: center;"><img src="/assets/img/acs.jpg" alt="Shri. Satish Lokhande, IAS" title="Shri. Satish Lokhande, IAS" style="border-radius:50%; width:100px;"></div>
              <h4 class="title" style="text-align: center;color: #fff;">Smt. Valsa Nair Singh, IAS</h4>
              <p class="description" style="text-align: center;color: #fff;">Additional Chief Secretary, Housing </p>
            </div>
            <br/>
          <div class="icon-box" style="background-color: #008eff;padding:2px; "><br/>
              <div class="icon" style="text-align: center;"><img src="/assets/img/ceo_sk.png" alt="Shri. Satish Lokhande, IAS" title="Shri. Satish Lokhande, IAS" style="border-radius:50%; width:100px;"></div>
              <h4 class="title" style="text-align: center;color: #fff;">Shri. Satish Lokhande, IAS</h4>
              <p class="description" style="text-align: center;color: #fff;">Chief Executive Officer, SRA</p>
            </div>
          <!-- end -->
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2> Jurisdictions of CA’s for Annexure-II</h2><br><br>
            <table style="border-collapse: collapse; border: 1px solid black; width:100%;">
                <thead>
                    <tr>
                    <th style="border: 1px solid black; padding: 8px; width:20%;">CA No</th>
                    <th style="border: 1px solid black; padding: 8px;width:40%;">Name</th>
                    <th style="border: 1px solid black; padding: 8px; width:30%;">Jurisdiction</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td style="border: 1px solid black; padding: 8px;">CA 1</td>
                    <td style="border: 1px solid black; padding: 8px;">Shri.Vishwas Gujar</td>
                    <td style="border: 1px solid black; padding: 8px;">"Bhuleshwar, Byculla, Colaba, Dadar-Naigaon, Dharavi,Fort,Girgaon,Lower Parel,Mahim,Malabar Cumbala Hill,Mandvi,Matunga, Mazgaon,Parel-Shivedi,Princess Dock,Salt Pan,Sion,Tardeo,Worli"</td>
                    </tr>
                    <tr>
                    <td style="border: 1px solid black; padding: 8px;">CA 2</td>
                    <td style="border: 1px solid black; padding: 8px;">Smt.Vandana Georaikar</td>
                    <td style="border: 1px solid black; padding: 8px;">"Bandra-A,Bandra-B,Bandra-C,Bandra-D,Bandra-E,Bandra-East,Bandra-F,Bandra-G,Bandra-H,Bandra-I,Juhu,Parighkhadi"</td>
                    </tr>
                    <tr>
                    <td style="border: 1px solid black; padding: 8px;">CA 3</td>
                    <td style="border: 1px solid black; padding: 8px;">Shri.Nandkumar Koshti</td>
                    <td style="border: 1px solid black; padding: 8px;">"Ambivali,Andheri,Bramhanwada,Chakala,Ismalia,Kolekalyan,Sahar,Versova,Vile Parle -East,Vile Parle -West"</td>
                    </tr>
                    <tr>
                    <td style="border: 1px solid black; padding: 8px;">CA 4</td>
                    <td style="border: 1px solid black; padding: 8px;">Smt.Vaishali Lambhate</td>
                    <td style="border: 1px solid black; padding: 8px;">"Bandivli,Bapnala,Gundavali,Kondivate,Madh,Majas,Marol,Mogra,Mulgaon,Oshiwara,Prajapur,Vyaravli"</td>
                    </tr>
                    <tr>
                    <td style="border: 1px solid black; padding: 8px;">CA 5</td>
                    <td style="border: 1px solid black; padding: 8px;">Shri.Pawan Chandak</td>
                    <td style="border: 1px solid black; padding: 8px;">"Aakse,Daravali,Erangal,Kurar,Malad-East,Malad-North,Malad-South,Malvani,Manori,Marve"</td>
                    </tr>
                    <tr>
                    <td style="border: 1px solid black; padding: 8px;">CA 6</td>
                    <td style="border: 1px solid black; padding: 8px;">Smt.Prishali Dighavkar</td>
                    <td style="border: 1px solid black; padding: 8px;">"Aarey,Akurli,Chinchavali,Dindoshi,Goregaon,Gundgaon,Klerabad,Marol Maroshi,Pahadi Eksar,Phadi Goregaon-East,Phadi Goregaon-West,Poisar,Saai,Tulsi,Valnai"
                    </td>
                    </tr>
                    <tr>
                    <td style="border: 1px solid black; padding: 8px;">CA 7</td>
                    <td style="border: 1px solid black; padding: 8px;">Shri.Prashant Suryawanshi</td>
                    <td style="border: 1px solid black; padding: 8px;">"Borivali,Chakop,Dahisar,Eksar,Gorai,Kandivali,Kanheri,Magathane,Mandpeshwar,Shimpawali,Wadhwan"
                    </td>
                    </tr>
                    <tr>
                    <td style="border: 1px solid black; padding: 8px;">CA 8</td>
                    <td style="border: 1px solid black; padding: 8px;">Shri.Shivajirao Davbhat</td>
                    <td style="border: 1px solid black; padding: 8px;">"Bhandup,Chandivali,Ghatkopar,Ghatkopar Kirol,Hariyali-E,Hariyali-W,Kanjur,Kopri,Mulund-E,Mulund-W,Nahur,Paspoli,Powai,Saki,Tirandaz,Tungwe,Vikhroli"</td>
                    </tr>
                    <tr>
                    <td style="border: 1px solid black; padding: 8px;">CA 9</td>
                    <td style="border: 1px solid black; padding: 8px;">Shri.Shivajirao Davbhat (Additional Charge)</td>
                    <td style="border: 1px solid black; padding: 8px;">"Aslape,Kirol,Kurla-1,Kurla-2,Kurla-3,Kurla-4,Mohili"</td>
                    </tr>
                    <tr>
                    <td style="border: 1px solid black; padding: 8px;">CA 10</td>
                    <td style="border: 1px solid black; padding: 8px;">Shri.Ravindra Hajare</td>
                    <td style="border: 1px solid black; padding: 8px;">"Manbudruk,Anik,Borla,Chembur,Deonar,Mahul,Mandale,Mankhurd,Maravali,Turbhe,Vadhavali"</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Gallery Section ======= -->
    <!--  -->
    <!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Contact</h2>
                <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
            </div>
            <div>
                <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.2068900349964!2d72.84261495057194!3d19.054639187036827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c93ef77cd569%3A0x69980223abace7b4!2sSRA%20office%20Bandra%20East!5e0!3m2!1sen!2sin!4v1680456856006!5m2!1sen!2sin" frameborder="0" allowfullscreen ></iframe>
            </div>
        </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>SRA Annexure-II</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/butterfly-free-bootstrap-theme/ -->
        
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
@endsection