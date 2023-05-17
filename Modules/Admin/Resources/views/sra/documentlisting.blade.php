@extends('admin::layout')

@component('admin::include.page.header')
    @slot('title', clean(trans('admin::sra.sradetailtitle')))
    <li class="nav-item">
        <a href="#">
            {{ clean(trans('admin::sra.sradetailtitle')) }}
        </a>
    </li>
@endcomponent

<style type="text/css">

.zoom {
  cursor: zoom-in;
  transition: transform 0.2s ease-in-out;

}

.zoom-in {
  cursor: zoom-out;
  transform: scale(1.5);

}

  
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 50% !important; /* Full height */
  overflow: scroll !important;
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: fixed !important;
  top: 100px;
  right: 45px;
  color: #fff !important;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}  

.tabs {
  position: relative;
  /*background: #ccc;*/
  height: 400.75rem;
}
.tabs::before,
.tabs::after {
  content: "";
  display: table;
}
.tabs::after {
  clear: both;
}
.tab {
  float: left;
  border: 1px solid #bdc3c7;
}
.tab-switch {
  display: none;
}
.tab-label {
  position: relative;
  display: block;
  line-height: 2.75em;
  height: 3em;
  padding: 0 1.618em;
  background: #ccc;
  color: #fff;
  cursor: pointer;
  top: 0;
  transition: all 0.25s;
}
.tab-label:hover {
  top: -0.25rem;
  transition: top 0.25s;
}
.tab-content {
  position: absolute;
  z-index: 1;
  top: 2.75em;
  left: 0;
  background: #fff;
  color: #2c3e50;
  border:1px solid #bdc3c7;
  opacity: 0;
  transition: all 0.35s;
  width:100%;
}
.tab-switch:checked + .tab-label {
  background: #fff;
  color: #2c3e50;
  border-bottom: 0;
  border-right: 0.125rem solid #fff;
  transition: all 0.35s;
  z-index: 1;
  
}
.tab-switch:checked + label + .tab-content {
  z-index: 2;
  opacity: 1;
  transition: all 0.35s;
}
th,
    td {
        border-bottom: none !important;
        height: 30px !important;
        font-size:16px !important;
    }
    h4{
      font-size:18px !important;
      font-weight: bold !important;
    }
  

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: black;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Create four equal columns that floats next to eachother */
.column {
  float: left;
  width: 25%;
}


</style>

@section('content')


              
    <div class="row">
        <div class="col-md-12">
          <!-- tab start-->
           <div class="card">
            <div class="card-body">
            <div class="tabs">
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-1"  checked class="tab-switch">
                 <label for="tab-1" class="tab-label" style="color:#fff !important; font-size:18px !important;
                 font-weight: bold !important;">Hut Documents</label>
                <div class="tab-content">
                  <!-- sims data start-->
                  <!-- body start -->
                              <div class="table-responsive" id="sra-table">
                                <table class="table table-borderless table-responsive">
                                  <thead>
                                      <tr>
                                        <th>Cluster Id</th>
                                      <th>Hut Id</th>
                                      
                                      <th>Scheme Name</th>
                                      <th>Owner Name</th>
                                      <th>Address</th>
                                      <th>Categories</th>
                                      <th>Floor</th>
                                      <th>Length</th>
                                      <th>Width</th>
                                      <th>Area</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      @foreach($query as $data)
                                      <td>{{$data->ClusterId}}</td>
                                        <td>{{$data->HUTSURVERYID}}</td>
                                        <?php $hid = $data->HUTSURVERYID ?>
                                        
                                        <td>{{$data->SchemeName}}</td>                                        
                                        <td>{{$data->HUTOWNERNAME}}</td>
                                        <td>{{$data->Address}}</td>
                                        <td>{{$data->PropertyType}}</td>
                                        <td>{{$data->FLOORNUM}}</td>
                                        <td>{{round($data->HUTLENGTH,2)}}</td>
                                        <td>{{round($data->HUTWIDTH,2)}}</td>
                                        <td>{{round($data->Area,2)}}</td>
                                      @endforeach
                                  </tr>
                                  </tbody>
                                </table>
                              </div>
                  <!-- sims data end -->
                  <!-- proof start-->
                  <div class="col-md-12">
                      <div class="card">
                        <div class="card-body">
                          <!-- start-->
                          <div class="d-flex align-items-center">
                            <h2 class="card-title"><i class="fas fa-list"></i> &nbsp;SIMS Images</h2>
                          </div>
                          <br><br>
                          <div class="row">
                          @foreach ($query1 as $key => $value)
                              <div id="modal{{$value->DOCCategory}}" class="modal">
                                <div class="modal-content">
                                    <img class="full-image" src="" id="img{{$value->DOCCategory}}"/>
                                    <span class="close">&times;</span>
                                </div>
                              </div>
                              @if ($value->DocumentContent)
                                  <div class="col-md-3">
                                      <h3>{{ str_replace("_"," ",$value->DOCCategory) }}</h3>

                                      <!-- Cache selectors -->
                                      @php
                                          $thumbnailClass = 'thumbnail_' . $value->DOCCategory;
                                          $thumbnailSrc = 'data:image/png;base64,' . base64_encode($value->DocumentContent);
                                      @endphp

                                      <img class="{{ $thumbnailClass }} thumbnail" src="{{ $thumbnailSrc }}"
                                          width='150' height='150' />
                                  </div>
                              @else
                                  {{-- <p>No image data found.</p> --}}
                              @endif
                              <script>
                                // Get the modal and the full-size image
                                var modal = document.getElementById('modal{{$value->DOCCategory}}');
                                var fullImage = modal.querySelector('.full-image');
                                var modalImg = document.getElementById("img{{$value->DOCCategory}}");

  
                                // Add a single click event listener to a common parent element
                                var thumbnails = document.querySelectorAll('.thumbnail');
                                thumbnails.forEach(function(thumbnail) {
                                    thumbnail.addEventListener('click', function() {
                                        // Set the source of the full-size image
                                        fullImage.src = this.src;
                                        modalImg.classList.add("zoom");
                                        // Show the modal
                                        modal.style.display = 'block';
                                    });
                                });
  
                                // Get the close button and add a click event listener
                                var closeButton = modal.querySelector('.close');
                                closeButton.addEventListener('click', function() {
                                    // Hide the modal
                                    modalImg.classList.remove("zoom");
                                    modal.style.display = 'none';
                                });
                                 // Zoom in and out on double-click
                                 modalImg.ondblclick = function() {
                                    if (modalImg.classList.contains("zoom")) {
                                      modalImg.classList.remove("zoom");
                                      modalImg.classList.add("zoom-in");
                                    } else if (modalImg.classList.contains("zoom-in")) {
                                      modalImg.classList.remove("zoom-in");
                                      modalImg.classList.add("zoom");
                                    }
                                  }
                                </script>
                          @endforeach
                            
                          </div>
                          <!-- end -->
                        </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="card">
                        <div class="card-body">
                          <!-- start-->
                          <div class="d-flex align-items-center">
                            <h2 class="card-title"><i class="fas fa-list"></i> &nbsp; Uploded by CA Missing Documents</h2>
                          </div>
                          <br><br>
                          <div class="row">
                          
                          @foreach ($election_document as $key => $value)
                              <div id="modal{{ $value->voter_image }}{{ $value->year }}" class="modal">
                                <div class="modal-content">
                                    <img class="full-image" src="" />
                                    <span class="close">&times;</span>
                                </div>
                              </div>
                              @if ($value->voter_image)
                                  <div class="col-md-3">
                                    <?php
                                      $year_title = '';
                                      if($value->year == '2000')
                                        $year_title = 'Year 2000 or Before';
                                      if($value->year == '2011')
                                        $year_title = 'Year 2001 or Before Year 2011';
                                      if($value->year == '2023')
                                        $year_title = 'Current Year';
                                      
                                      
                                    ?>
                                      <h3>Election Document {{ $year_title }}</h3>

                                      <img class="{{ $value->voter_image }} thumbnail" src=" http://sra-uat.apniamc.in/images/{{ $value->voter_image }}"
                                          width='150' height='150' onerror="this.onerror=null;this.src='http://sra-uat.apniamc.in/images/noimage.jpg';"/>
                                  </div>
                              @else
                                  {{-- <p>No image data found.</p> --}}
                              @endif
                              <script>
                              // Get the modal and the full-size image
                              var modal = document.getElementById('modal{{ $value->voter_image }}{{ $value->year }}');
                              var fullImage = modal.querySelector('.full-image');

                              // Add a single click event listener to a common parent element
                              var thumbnails = document.querySelectorAll('.thumbnail');
                              thumbnails.forEach(function(thumbnail) {
                                  thumbnail.addEventListener('click', function() {
                                      // Set the source of the full-size image
                                      fullImage.classList.add("zoom");
                                      fullImage.src = this.src;

                                      // Show the modal
                                      modal.style.display = 'block';
                                  });
                              });

                              // Get the close button and add a click event listener
                              var closeButton = modal.querySelector('.close');
                              closeButton.addEventListener('click', function() {
                                  // Hide the modal
                                  fullImage.classList.remove("zoom");
                                  modal.style.display = 'none';
                              });
                              fullImage.ondblclick = function() {
                                    if (fullImage.classList.contains("zoom")) {
                                      fullImage.classList.remove("zoom");
                                      fullImage.classList.add("zoom-in");
                                    } else if (fullImage.classList.contains("zoom-in")) {
                                      fullImage.classList.remove("zoom-in");
                                      fullImage.classList.add("zoom");
                                    }
                                  }
                              </script>
                          @endforeach
                          @foreach ($electricity_document as $key => $value)
                            <div id="modal{{ $value->bill_image }}{{ $value->year }}" class="modal">
                              <div class="modal-content">
                                  <img class="full-image" src="" />
                                  <span class="close">&times;</span>
                              </div>
                            </div>
                            @if ($value->bill_image)
                                <div class="col-md-3">
                                    <?php
                                      $year_title = '';
                                      if($value->year == '2000')
                                        $year_title = 'Year 2000 or Before';
                                      if($value->year == '2011')
                                        $year_title = 'Year 2001 or Before Year 2011';
                                      if($value->year == '2023')
                                        $year_title = 'Current Year';                                     
                                    ?>
                                    <h3>Electricity Document {{ $year_title }}</h3>

                                    <img class="{{ $value->bill_image }} thumbnail" src=" http://sra-uat.apniamc.in/images/{{ $value->bill_image }}"
                                        width='150' height='150' onerror="this.onerror=null;this.src='http://sra-uat.apniamc.in/images/noimage.jpg';"/>
                                </div>
                            @else
                                {{-- <p>No image data found.</p> --}}
                            @endif
                            <script>
                              // Get the modal and the full-size image
                              var modal = document.getElementById('modal{{ $value->bill_image }}{{ $value->year }}');
                              var fullImage = modal.querySelector('.full-image');

                              // Add a single click event listener to a common parent element
                              var thumbnails = document.querySelectorAll('.thumbnail');
                              thumbnails.forEach(function(thumbnail) {
                                  thumbnail.addEventListener('click', function() {
                                      // Set the source of the full-size image
                                      fullImage.src = this.src;

                                      // Show the modal
                                      fullImage.classList.add("zoom");
                                      modal.style.display = 'block';
                                  });
                              });

                              // Get the close button and add a click event listener
                              var closeButton = modal.querySelector('.close');
                              closeButton.addEventListener('click', function() {
                                  // Hide the modal
                                  fullImage.classList.remove("zoom");
                                  modal.style.display = 'none';
                              });
                              fullImage.ondblclick = function() {
                                    if (fullImage.classList.contains("zoom")) {
                                      fullImage.classList.remove("zoom");
                                      fullImage.classList.add("zoom-in");
                                    } else if (fullImage.classList.contains("zoom-in")) {
                                      fullImage.classList.remove("zoom-in");
                                      fullImage.classList.add("zoom");
                                    }
                                  }
                          </script>
                          @endforeach
                          @foreach ($agreement_document as $key => $value)
                          <div class="col-md-3">

                              <div id="modal{{ $value->file }}{{ $value->year }}" class="modal">
                                <div class="modal-content">
                                    <img class="full-image" src="" />
                                    <span class="close">&times;</span>
                                </div>
                              </div>
                              @if ($value->file)
                                  
                                     <?php
                                        $year_title = '';
                                        if($value->year == '2000')
                                        $year_title = 'Year 2000 or Before';
                                        if($value->year == '2011')
                                        $year_title = 'Year 2001 or Before Year 2011';
                                        if($value->year == '2023')
                                        $year_title = 'Current Year';                                     
                                      ?>
                                      <h3>Agreement Document {{ $year_title }}</h3>
                                      <?php 
                                        $agreements = array();
                                        $agreements = explode(',',$value->file); 
                                        $img_url = "http://sra-uat.apniamc.in/images/" . $agreements[0];
                                        // $mime_type = mime_content_type($img_url);
                                        $mime_type = pathinfo($img_url, PATHINFO_EXTENSION);
                                        // print_r($agreement);die;
                                        if ((strpos($mime_type, 'image') !== false) || strpos($mime_type,'jpeg') !== false) {
                                          // echo "<img src=\"$img_url\" data-src=\"$img_url\"  style=\"height:320px;width:250px;\" id=\"myImg\">";
                                          foreach($agreements as $img_new){
                                            // print_r($img);
                                            $i = 1;
                                            // echo '<div class="column">';
                                            echo '<img src="http://sra-uat.apniamc.in/images/'.$img_new.'" onclick="openModal();currentSlide('.$i.')" class="hover-shadow"  style=\"height:320px;width:250px;\">' ;
                                            // echo '</div>';
                                            $i++;
                                            break;
                                          }
                                      } elseif ($mime_type === 'pdf') {
                                          echo "<img src=\"http://sra-uat.apniamc.in/images/pdf_img.png\" data-src=\"$img_url\" width=\"150\" height=\"150\" id=\"myImg_pdf\" >";
                                          ?>
                                          <!-- code for pdf modal need to check-->
                                          <!-- facing issue all images display in pdf modal-->

                                           <!-- <div id="myModal_pdf" class="modal">
                                              <span class="close" onclick="closeModal_pdf()">&times;</span>
                                              <embed class="modal-content"  id="img012" width="500" height="375" type='application/pdf'>
                                              <div id="caption"></div>
                                            </div>
                                            <script>
                                                // Get the modal
                                                var modal = document.getElementById("myModal_pdf");

                                                // Get the image and insert it inside the modal - use its "alt" text as a caption
                                                var img = document.getElementById("myImg_pdf");
                                                var modalImg = document.getElementById("img012");
                                                var captionText = document.getElementById("caption");
                                                img.onclick = function(){
                                                  modal.style.display = "block";
                                                  // alert(this.src);
                                                  // modalImg.src = this.src;
                                                  modalImg.src = this.getAttribute("data-src");;

                                                  modalImg.classList.add("zoom");
                                                  captionText.innerHTML = this.alt;
                                                }

                                                // Get the <span> element that closes the modal
                                                var span = document.getElementsByClassName("close")[0];

                                                // When the user clicks on <span> (x), close the modal
                                                span.onclick = function() { 
                                                  modal.style.display = "none";
                                                  modalImg.classList.remove("zoom");
                                                }

                                                // Zoom in and out on double-click
                                                modalImg.ondblclick = function() {
                                                  if (modalImg.classList.contains("zoom")) {
                                                    modalImg.classList.remove("zoom");
                                                    modalImg.classList.add("zoom-in");
                                                  } else if (modalImg.classList.contains("zoom-in")) {
                                                    modalImg.classList.remove("zoom-in");
                                                    modalImg.classList.add("zoom");
                                                  }
                                                }
                                            </script> -->
                                            <!-- end of modal -->
                                          <?php
                                      }
                                      ?>
                                      
                                      <div id="myModal_pdf" class="modal" style="left:5%;height:60% !important;">
                                        <div class="row">
                                          <div class="col-md-1"></div>
                                          <div class="col-md-10">
                                             
                                              <embed class="modal-content"  id="img012" width="500" height="375" type='application/pdf' style="max-width:95%;">
                                              <div id="caption"></div>
                                          </div>
                                          <div class="col-md-1"> <span class="close" onclick="closeModal_pdf()" >&times;</span></div>
                                        </div>
                                    </div>
                                      <script>
                                      // Get the modal
                                      var modalpf = document.getElementById("myModal_pdf");

                                      // Get the image and insert it inside the modal - use its "alt" text as a caption
                                      var img = document.getElementById("myImg_pdf");
                                      var modalpdf = document.getElementById("img012");
                                      var captionText = document.getElementById("caption");
                                      img.onclick = function(){
                                        modalpf.style.display = "block";
                                        // alert(this.src);
                                        // modalImg.src = this.src;
                                        modalpdf.src = this.getAttribute("data-src");;

                                        modalpdf.classList.add("zoom");
                                        captionText.innerHTML = this.alt;
                                      }

                                      // Get the <span> element that closes the modal
                                      var span = document.getElementsByClassName("close")[0];

                                      // When the user clicks on <span> (x), close the modal
                                      span.onclick = function() { 
                                        modal.style.display = "none";
                                        modalpdf.classList.remove("zoom");
                                      }

                                      // Zoom in and out on double-click
                                      modalpdf.ondblclick = function() {
                                        if (modalpdf.classList.contains("zoom")) {
                                          modalpdf.classList.remove("zoom");
                                          modalpdf.classList.add("zoom-in");
                                        } else if (modalpdf.classList.contains("zoom-in")) {
                                          modalpdf.classList.remove("zoom-in");
                                          modalpdf.classList.add("zoom");
                                        }
                                      }
                                      </script>
                                      <div id="myModal" class="modal">
                                        <span class="close cursor" onclick="closeModal()">&times;</span>

                                            <div class="modal-content" id="img01">
                                              <a class="prev" onclick="plusSlides(-1)">&#10094;</a>

                                                <div id="caption"></div>
                                                <!-- <a class="zoom-in" onclick="zoomIn()">+</a> -->
                                              <!-- <a class="zoom-out" onclick="zoomOut()">-</a> -->

                                                <?php
                                                  foreach($agreements as $img_new){
                                                    // print_r($img);
                                                    echo '<div class="mySlides">';
                                                    echo '<img src="http://sra-uat.apniamc.in/images/'.$img_new.'" style="width:100%" id="myImg">';
                                                    echo '</div>';
                                                  }
                                                  ?>

                                              <a class="next" onclick="plusSlides(1)">&#10095;</a>     
                                            </div>

                                      </div>
                                                  
                                    </div>
                              @else
                                  {{-- <p>No image data found.</p> --}}
                              @endif
                              
                          @endforeach
                          @foreach ($gumasta_document as $key => $value)
                              <div id="modal{{ $value->file }}{{ $value->year }}" class="modal">
                                <div class="modal-content">
                                    <img class="full-image" src="" />
                                    <span class="close">&times;</span>
                                </div>
                              </div>
                              @if ($value->file)
                                  <div class="col-md-3">
                                    <?php
                                      $year_title = '';
                                      if($value->year == '2000')
                                        $year_title = 'Year 2000 or Before';
                                      if($value->year == '2011')
                                        $year_title = 'Year 2001 or Before Year 2011';
                                      if($value->year == '2023')
                                        $year_title = 'Current Year';                                     
                                    ?>
                                      <h3>Gumasta Document {{ $year_title }}</h3>

                                      <img class="{{ $value->file }} thumbnail" src=" http://sra-uat.apniamc.in/images/{{ $value->file }}"
                                          width='150' height='150' onerror="this.onerror=null;this.src='http://sra-uat.apniamc.in/images/noimage.jpg';"/>
                                  </div>
                              @else
                                  {{-- <p>No image data found.</p> --}}
                              @endif
                              <script>
                              // Get the modal and the full-size image
                              var modal = document.getElementById('modal{{ $value->file }}{{ $value->year }}');
                              var fullImage = modal.querySelector('.full-image');

                              // Add a single click event listener to a common parent element
                              var thumbnails = document.querySelectorAll('.thumbnail');
                              thumbnails.forEach(function(thumbnail) {
                                  thumbnail.addEventListener('click', function() {
                                      // Set the source of the full-size image
                                      fullImage.src = this.src;

                                      // Show the modal
                                      fullImage.classList.add("zoom");
                                      modal.style.display = 'block';
                                  });
                              });

                              // Get the close button and add a click event listener
                              var closeButton = modal.querySelector('.close');
                              closeButton.addEventListener('click', function() {
                                  // Hide the modal
                                  fullImage.classList.remove("zoom");
                                  modal.style.display = 'none';
                              });
                              fullImage.ondblclick = function() {
                                    if (fullImage.classList.contains("zoom")) {
                                      fullImage.classList.remove("zoom");
                                      fullImage.classList.add("zoom-in");
                                    } else if (fullImage.classList.contains("zoom-in")) {
                                      fullImage.classList.remove("zoom-in");
                                      fullImage.classList.add("zoom");
                                    }
                                  }
                              </script>
                          @endforeach
                            
                          @foreach ($photopass_document as $key => $value)
                              <div id="modal{{ $value->survey_receipt_image }}{{ $value->year }}" class="modal">
                                <div class="modal-content">
                                    <img class="full-image" src="" />
                                    <span class="close">&times;</span>
                                </div>
                              </div>
                              @if ($value->survey_receipt_image)
                                  <div class="col-md-3">
                                    <?php
                                      $year_title = '';
                                      if($value->year == '2000')
                                        $year_title = 'Year 2000 or Before';
                                      if($value->year == '2011')
                                        $year_title = 'Year 2001 or Before Year 2011';
                                      if($value->year == '2023')
                                        $year_title = 'Current Year';                                     
                                    ?>
                                      <h3>Photopass Document {{ $year_title }}</h3>

                                      <img class="{{ $value->survey_receipt_image }} thumbnail" src=" http://sra-uat.apniamc.in/images/{{ $value->survey_receipt_image }}"
                                          width='150' height='150' onerror="this.onerror=null;this.src='http://sra-uat.apniamc.in/images/noimage.jpg';"/>
                                  </div>
                              @else
                                  {{-- <p>No image data found.</p> --}}
                              @endif
                              <script>
                              // Get the modal and the full-size image
                              var modal = document.getElementById('modal{{ $value->survey_receipt_image }}{{ $value->year }}');
                              var fullImage = modal.querySelector('.full-image');

                              // Add a single click event listener to a common parent element
                              var thumbnails = document.querySelectorAll('.thumbnail');
                              thumbnails.forEach(function(thumbnail) {
                                  thumbnail.addEventListener('click', function() {
                                      // Set the source of the full-size image
                                      fullImage.classList.add("zoom");
                                      fullImage.src = this.src;

                                      // Show the modal
                                      modal.style.display = 'block';
                                  });
                              });

                              // Get the close button and add a click event listener
                              var closeButton = modal.querySelector('.close');
                              closeButton.addEventListener('click', function() {
                                  // Hide the modal
                                  fullImage.classList.remove("zoom");
                                  modal.style.display = 'none';
                              });
                              fullImage.ondblclick = function() {
                                    if (fullImage.classList.contains("zoom")) {
                                      fullImage.classList.remove("zoom");
                                      fullImage.classList.add("zoom-in");
                                    } else if (fullImage.classList.contains("zoom-in")) {
                                      fullImage.classList.remove("zoom-in");
                                      fullImage.classList.add("zoom");
                                    }
                                  }
                              </script>
                          @endforeach
                          
                          @foreach ($adhar_document as $key => $value)
                              <div class="col-md-3">

                                  <div id="modal{{ $value->file }}" class="modal">
                                    <div class="modal-content">
                                        <img class="full-image" src="" />
                                        <span class="close">&times;</span>
                                    </div>
                                  </div>
                                  @if ($value->file)
                                      
                                        
                                          <h3>Adhar Document </h3>
                                          <?php 
                                            $adhars = array();
                                            $adhars = explode(',',$value->file); 
                                            $img_url = "http://sra-uat.apniamc.in/images/" . $adhars[0];
                                            // $mime_type = mime_content_type($img_url);
                                            $mime_type = pathinfo($img_url, PATHINFO_EXTENSION);
                                            if ((strpos($mime_type, 'image') !== false) || strpos($mime_type,'jpeg') !== false) {
                                              // echo "<img src=\"$img_url\" data-src=\"$img_url\"  style=\"height:320px;width:250px;\" id=\"myImg\">";
                                              foreach($adhars as $img_new){
                                                // print_r($img);
                                                $i = 1;
                                                // echo '<div class="column">';
                                                echo '<img src="http://sra-uat.apniamc.in/images/'.$img_new.'" onclick="openModal();currentSlide('.$i.')" class="hover-shadow"  style=\"height:320px;width:250px;\">' ;
                                                // echo '</div>';
                                                $i++;
                                                break;
                                              }
                                          } elseif ($mime_type === 'pdf') {
                                              echo "<img src=\"http://sra-uat.apniamc.in/images/pdf_img.png\" data-src=\"$img_url\" width=\"150\" height=\"150\" id=\"myImg_pdf\" >";
                                              ?>
                                              <!-- code for pdf modal need to check-->
                                              <!-- facing issue all images display in pdf modal-->

                                              <!-- <div id="myModal_pdf" class="modal">
                                                  <span class="close" onclick="closeModal_pdf()">&times;</span>
                                                  <embed class="modal-content"  id="img012" width="500" height="375" type='application/pdf'>
                                                  <div id="caption"></div>
                                                </div>
                                                <script>
                                                    // Get the modal
                                                    var modal = document.getElementById("myModal_pdf");

                                                    // Get the image and insert it inside the modal - use its "alt" text as a caption
                                                    var img = document.getElementById("myImg_pdf");
                                                    var modalImg = document.getElementById("img012");
                                                    var captionText = document.getElementById("caption");
                                                    img.onclick = function(){
                                                      modal.style.display = "block";
                                                      // alert(this.src);
                                                      // modalImg.src = this.src;
                                                      modalImg.src = this.getAttribute("data-src");;

                                                      modalImg.classList.add("zoom");
                                                      captionText.innerHTML = this.alt;
                                                    }

                                                    // Get the <span> element that closes the modal
                                                    var span = document.getElementsByClassName("close")[0];

                                                    // When the user clicks on <span> (x), close the modal
                                                    span.onclick = function() { 
                                                      modal.style.display = "none";
                                                      modalImg.classList.remove("zoom");
                                                    }

                                                    // Zoom in and out on double-click
                                                    modalImg.ondblclick = function() {
                                                      if (modalImg.classList.contains("zoom")) {
                                                        modalImg.classList.remove("zoom");
                                                        modalImg.classList.add("zoom-in");
                                                      } else if (modalImg.classList.contains("zoom-in")) {
                                                        modalImg.classList.remove("zoom-in");
                                                        modalImg.classList.add("zoom");
                                                      }
                                                    }
                                                </script> -->
                                                <!-- end of modal -->
                                              <?php
                                          }
                                          ?>
                                          
                                          <div id="myModal_pdf" class="modal" style="left:5%;height:60% !important;">
                                            <div class="row">
                                              <div class="col-md-1"></div>
                                              <div class="col-md-10">
                                                
                                                  <embed class="modal-content"  id="img012" width="500" height="375" type='application/pdf' style="max-width:95%;">
                                                  <div id="caption"></div>
                                              </div>
                                              <div class="col-md-1"> <span class="close" onclick="closeModal_pdf()" >&times;</span></div>
                                            </div>
                                        </div>
                                          <script>
                                          // Get the modal
                                          var modalpf = document.getElementById("myModal_pdf");

                                          // Get the image and insert it inside the modal - use its "alt" text as a caption
                                          var img = document.getElementById("myImg_pdf");
                                          var modalpdf = document.getElementById("img012");
                                          var captionText = document.getElementById("caption");
                                          img.onclick = function(){
                                            modalpf.style.display = "block";
                                            // alert(this.src);
                                            // modalImg.src = this.src;
                                            modalpdf.src = this.getAttribute("data-src");;

                                            modalpdf.classList.add("zoom");
                                            captionText.innerHTML = this.alt;
                                          }

                                          // Get the <span> element that closes the modal
                                          var span = document.getElementsByClassName("close")[0];

                                          // When the user clicks on <span> (x), close the modal
                                          span.onclick = function() { 
                                            modal.style.display = "none";
                                            modalpdf.classList.remove("zoom");
                                          }

                                          // Zoom in and out on double-click
                                          modalpdf.ondblclick = function() {
                                            if (modalpdf.classList.contains("zoom")) {
                                              modalpdf.classList.remove("zoom");
                                              modalpdf.classList.add("zoom-in");
                                            } else if (modalpdf.classList.contains("zoom-in")) {
                                              modalpdf.classList.remove("zoom-in");
                                              modalpdf.classList.add("zoom");
                                            }
                                          }
                                          </script>
                                          <div id="myModal" class="modal">
                                            <span class="close cursor" onclick="closeModal()">&times;</span>

                                                <div class="modal-content" id="img01">
                                                  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>

                                                    <div id="caption"></div>
                                                    <!-- <a class="zoom-in" onclick="zoomIn()">+</a> -->
                                                  <!-- <a class="zoom-out" onclick="zoomOut()">-</a> -->

                                                    <?php
                                                      foreach($adhars as $img_new){
                                                        // print_r($img);
                                                        echo '<div class="mySlides">';
                                                        echo '<img src="http://sra-uat.apniamc.in/images/'.$img_new.'" style="width:100%" id="myImg">';
                                                        echo '</div>';
                                                      }
                                                      ?>

                                                  <a class="next" onclick="plusSlides(1)">&#10095;</a>     
                                                </div>

                                          </div>
                                                      
                                        </div>
                                  @else
                                      {{-- <p>No image data found.</p> --}}
                                  @endif
                                  
                              @endforeach

                              @foreach ($other_document as $key => $value)
                              <div id="modal{{ $value->image }}" class="modal">
                                <div class="modal-content">
                                    <img class="full-image" src="" />
                                    <span class="close">&times;</span>
                                </div>
                              </div>
                              @if ($value->image)
                                   
                                  <div class="col-md-3">
                                    
                                  <h3>{{ ucwords(str_replace("_"," ",$value->document_type)) }}</h3>

                                      <img class="{{ $value->image }} thumbnail" src=" http://sra-uat.apniamc.in/images/{{ $value->image }}"
                                          width='150' height='150' onerror="this.onerror=null;this.src='http://sra-uat.apniamc.in/images/noimage.jpg';"/>
                                  </div>
                              @else
                                  {{-- <p>No image data found.</p> --}}
                              @endif
                              <script>
                              // Get the modal and the full-size image
                              var modal = document.getElementById('modal{{ $value->image }}');
                              var fullImage = modal.querySelector('.full-image');

                              // Add a single click event listener to a common parent element
                              var thumbnails = document.querySelectorAll('.thumbnail');
                              thumbnails.forEach(function(thumbnail) {
                                  thumbnail.addEventListener('click', function() {
                                      // Set the source of the full-size image
                                      fullImage.classList.add("zoom");
                                      fullImage.src = this.src;

                                      // Show the modal
                                      modal.style.display = 'block';
                                  });
                              });

                              // Get the close button and add a click event listener
                              var closeButton = modal.querySelector('.close');
                              closeButton.addEventListener('click', function() {
                                  // Hide the modal
                                  fullImage.classList.remove("zoom");
                                  modal.style.display = 'none';
                              });
                              fullImage.ondblclick = function() {
                                    if (fullImage.classList.contains("zoom")) {
                                      fullImage.classList.remove("zoom");
                                      fullImage.classList.add("zoom-in");
                                    } else if (fullImage.classList.contains("zoom-in")) {
                                      fullImage.classList.remove("zoom-in");
                                      fullImage.classList.add("zoom");
                                    }
                                  }
                              </script>
                              @endforeach
                          </div>
                          <!-- end -->
                        </div>
                      </div>
                  </div>
                  <!-- proof end -->
                </div>
              </div>
              
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-2"  class="tab-switch">
                <a href="index.php/sra/detail/{{$hid}}" class="tab-label" style="color:#495057!important;font-size:16px !important;">Electricity</a>
                <div class="tab-content">          
                </div>   
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
                <a href="index.php/sra/elections/{{$hid}}" class="tab-label" style="color:#495057!important;font-size:16px !important;">Election</a>
                <div class="tab-content">Election Details</div>
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-4" class="tab-switch">
                <a href="index.php/sra/gumasta/{{$hid}}" class="tab-label" style="color:#495057!important;font-size:16px !important;">Gumasta</a>
                <div class="tab-content"></div>
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-5" class="tab-switch">
                <a href="#" class="tab-label" style="color:#495057!important;font-size:16px !important;">Photo Pass Details</a>
                <div class="tab-content">Photo Pass Details</div>
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-6"  class="tab-switch">
                <a href="index.php/sra/agreement/{{$hid}}" class="tab-label" style="color:#495057!important;font-size:16px !important;">Registration Agreement Details</a>
                <div class="tab-content">
                  
                </div>
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-7" class="tab-switch">
                <a href="index.php/sra/adhar/{{$hid}}" class="tab-label" style="color:#495057!important;font-size:16px !important;">Aadhaar Card</a>
                <div class="tab-content">Registration Agreement Details</div>
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-7" class="tab-switch">
                 <a href="index.php/sra/final/{{$hid}}" class="tab-label" style="color:#495057!important;font-size:16px !important;">Final Submission</a>
                <div class="tab-content">Final submission Details</div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection



<style>
  .tab-switch:checked + .tab-label {
    background: #1269db !important;
    color: white !important;
  }
  .tab-label{
    background: white !important;
  }
</style>

<script>
// Open the Modal
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

// Close the Modal
function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

// Close the Modal
function closeModal_pdf() {
  document.getElementById("myModal_pdf").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  var img = document.getElementById("myImg");

  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  // Zoom in/out functionality
    var currentZoom = 1;
    img.addEventListener("click", function() {
      if (currentZoom == 1) {
        img.classList.add("zoom-in");
        currentZoom++;
      } else {
        img.classList.remove("zoom-in");
        currentZoom--;
      }
    });
}
function zoomIn() {
  var img = document.getElementsByClassName("mySlides")[slideIndex-1].getElementsByTagName("img")[0];
  var currWidth = img.clientWidth;
  var currHeight = img.clientHeight;
  img.style.width = (currWidth + 100) + "px";
  img.style.height = (currHeight + 100) + "px";
}

function zoomOut() {
  var img = document.getElementsByClassName("mySlides")[slideIndex-1].getElementsByTagName("img")[0];
  var currWidth = img.clientWidth;
  var currHeight = img.clientHeight;
  img.style.width = (currWidth - 100) + "px";
  img.style.height = (currHeight - 100) + "px";
}

</script>
