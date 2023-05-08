@extends('admin::layout')

@component('admin::include.page.header')
    @slot('title', clean(trans('admin::sra.electricitytitle')))
    <li class="nav-item">
        <a href="#">
            {{ clean(trans('admin::sra.electricitytitle')) }}
        </a>
    </li>
@endcomponent
<style type="text/css">
.tabs {
  position: relative;
  background: #ccc;
  height: 250.75rem;
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
th ,td {
      border-bottom:none !important;
      height: 30px !important;
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
                <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
                <label for="tab-1" class="tab-label">Electricity</label>
                <div class="tab-content">
                  <!-- start -->
                  <!-- body start -->
                  <div class="table-responsive" id="sra-table">
                    <table class="table table-borderless table-responsive">
                      <thead>
                             <tr>
                          <th>Hut ID</th>
                          <th>Cluster ID</th>
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
                             <td>{{$data->HUTSURVERYID}}</td>
                             <?php $hid = $data->HUTSURVERYID ?>
                            <td>{{$data->ClusterId}}</td>
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
              <!-- body end -->
              <!-- year start-->
              <!-- year end -->
              <!-- end -->
            </div>
          </div>
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
            <label for="tab-2" class="tab-label">Election</label>
            <div class="tab-content">
              Election Details
            </div>
          </div>
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
            <label for="tab-3" class="tab-label">Gumasta</label>
            <div class="tab-content">Gumasta Details</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection



