@extends('admin::layout')


@component('admin::include.page.header')
    @slot('title', clean(trans('admin::sra.sralogs')))
    <li class="nav-item">
        <a href="#">
            {{ clean(trans('admin::sra.sralogs')) }}
        </a>
    </li>
@endcomponent

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif



                <div class="card-body">
            
                    <div class="table-responsive" id="sra-table" style='width:100%'>
                            <table class="table table-hover table-striped table-responsive">

                                <thead>
                                      <tr>
                                        <th data-sort>{{ clean(trans('admin::sra.table.id')) }}</th>
                                        <th>Hut ID</th>
                                        <th>Cluster Id</th>
                                        <th>Owner Name</th>
                                        <th>Address</th>
                                        <th>Floor Number</th>
                                        <th>Property Type</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $i = 1;
                                        foreach ($missing_document as $key => $value) {
                                            # code...
                                            echo "<tr><td>".$i."</td>";
                                            // echo "<td><a href='http://sra-uat.apniamc.in/index.php/en/sra/detail/".$value->hut_id."'>".$value->hut_id."</a></td>";
                                            ?>
                                            <td><a href="{{ route('admin.sra.uplodemissingdocument', ['hid' =>  $value->hut_id ]) }}">{{ $value->hut_id }}</a></td>
                                          <?php
                                            echo "<td>".$value->cluster_id."</td>";
                                            echo "<td>".$value->owner_name."</td>";
                                            echo "<td>".$value->address."</td>";
                                            echo "<td>".$value->floor_num."</td>";
                                            echo "<td>".$value->property_type."</td>";
                                            echo "<td>".$value->category."</td>";
                                           
                                            echo "</tr>";


                                            $i++;
                                        }
                                    ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('scripts')
    

<script>
    $(document).ready(function() {
      $('#sra-table .table').DataTable({
  "searching": true
});
  } );
   </script>
@endpush
