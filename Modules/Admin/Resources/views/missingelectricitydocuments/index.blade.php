 @extends('admin::layout')


@component('admin::include.page.header')
    @slot('title', clean(trans('admin::missingelectricitydocuments.missingelectricitydocumentslogs')))
    <li class="nav-item">
        <a href="#">
            {{ clean(trans('admin::missingelectricitydocuments.missingelectricitydocumentslogs')) }}
        </a>
    </li>
@endcomponent

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">{{ clean(trans('admin::missingelectricitydocuments.missingelectricitydocumentslogs')) }}</h4>
                    </div>
                </div>
                @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

                <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                            <table class="table table-hover table-striped table-responsive text-nowrap">

                                <thead>
                                        <tr>
                                    <th data-sort>{{ clean(trans('admin::missingelectricitydocuments.table.id')) }}</th>
                                    <th>{{ clean(trans('admin::missingelectricitydocuments.table.hutsurveyid')) }}</th>
                                    <th>{{ clean(trans('admin::missingelectricitydocuments.table.cluster_id')) }}</th>
                                    <th>{{ clean(trans('admin::missingelectricitydocuments.table.owner_name')) }}</th>
                                    <th>{{ clean(trans('admin::missingelectricitydocuments.table.address')) }}</th>
                                    <th>{{ clean(trans('admin::missingelectricitydocuments.table.property_type')) }}</th>
                                    <th>{{ clean(trans('admin::missingelectricitydocuments.table.floor_num')) }}</th>
                                    <th>Upload Status</th>
                                    <th>Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($query as $key => $value) {
                                            # code...
                                            echo "<tr><td>".$i."</td>";
                                            echo "<td>".$value->hut_id."</td>";
                                            echo "<td>".$value->cluster_id."</td>";
                                            echo "<td>".$value->owner_name."</td>";
                                            echo "<td>".$value->address."</td>";
                                            echo "<td>".$value->property_type."</td>";
                                            echo "<td>".$value->floor_num."</td>";
                                           if($value->status == 0){
                                                echo "<td> <button class='btn btn-danger'><i class='fa fa-window-close'></i></button></td>";
                                            }else{
                                                echo "<td> <button class='btn btn-success'><i class='fa fa-check'></i></button></td>";
                                            }

                                            echo "<td><a href='http://localhost/sraservices_working/public/missingelectricitydocuments/manualdata/".$value->hut_id."'>Upload </a></td>";
                                            // echo "<td>Electricity</td> </tr>";
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
    {{-- <script>
        DataTable.setRoutes('#sra-table .table', {
                index: '{{ "admin.missingelectricitydocuments.index" }}',
        });

        new DataTable('#sra-table .table', {
            columns: [
                { data: 'Sr no', name: 'id' },
                { data: 'HUTSURVERYID', name: 'hutsurveyid' ,orderable: false},

            ],
            searching: true
        });
    </script> --}}

<script>
    $(document).ready(function() {
      $('#sra-table .table').DataTable({
  "searching": true
});
  } );
   </script>
@endpush
