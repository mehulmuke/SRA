@extends('admin::fullwidth-layout')

@section('title', clean(trans('files::files.find_files_in_folders')))
@section('page-header')
    <div>
        <h2 class="text-white pb-2 fw-bold">{{ clean(trans('files::files.find_files_in_folders')) }}</h2>
        <?php /* <h5 class="text-white op-7 mb-2">{{ clean(trans('files::files.upload_new_file')) }}</h5> */?>
    </div>
@endsection 
@section('content')
   
   
    <div class="row">
        <div class="col-md-12">
             <div class="card m-0">
                <div class="card-body">    
                    <div class="row">
                        <div class="col-md-4">
                            <h4 for="select_folder">{{ clean(trans('files::files.form.select_folder')) }}
                            </h4> 
                            <div class="file-folder-tree"></div>
                        </div>
                        <div class="col-md-8">
                            <ul class="breadcrumbs upload-breadcrumbs pull-left">
                                <li class="nav-home">
                                    <a href="#">
                                        <i class="flaticon-home"></i>
                                    </a>
                                </li>
                                <span id="update"></span>
                            </ul>
                            <ul class="upload-breadcrumbs pull-right">
                                <li class="nav-home"  data-toggle="tooltip" title="{{clean(trans('files::files.download_folder'))}}">
                                    <a href="#" id="downloadFolder">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </li>
                             </ul>
                             <div class="clearfix"></div>

                            <div class="card m-0 ">
                                
                                <div class="card-body" id="files-table">
                                    <div class="table-responsive"><br>
                                        
                                        <table class="display table table-striped table-hover" >
                                                <thead>
                                                     <tr>
                                                        @include('admin::include.table.select-all',["name"=>clean(trans('files::files.files'))])

                                                        
                                                        <th>{{ clean(trans('files::files.table.name')) }}</th>
                                                        <th>{{ clean(trans('files::files.table.action')) }}</th>
                                                    </tr>
                                                </thead>

                                                <tbody></tbody>
                                            </table>
                                            @push('more-actions')
                                                @include('files::admin.files.include.more-actions')
                                            @endpush 
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
@endsection


@push('general')
    <script>
    (function () {
        "use strict";
        
        @if(!auth()->user()->isAdmin() && !setting('delete_assign_folder_files'))
            CI.langs['admin::admin.delete.confirmation_message'] = '{{ clean(trans('admin::admin.delete.confirmation_message')) }}'+'\n{{ clean(trans('files::files.delete_note_for_user')) }}';
        @endif
    })();  
    </script>
@endpush
@push('scripts')
<script>
    
    (function () {
        "use strict";
      
        $('.file-folder-tree').on('changed.jstree', function (e, data) {
            var id=data.selected[0];
            var table = $("#files-table table").DataTable();
           
           var url="<?php echo route('admin.files.index');?>";

           if(id!=''){
               table.ajax.url(url+'?table=true&category='+id).load();
           }else{
            table.ajax.url(url+'?table=true').load();
           }
        });
        
        
        DataTable.setRoutes('#files-table .table', {
            index: '{{ "admin.files.index" }}',
            
            @hasAccess("admin.files.edit")
                
                edit: '{{ "admin.files.edit" }}',
                
            @endHasAccess
            @hasAccess("admin.files.destroy") 
                destroy: '{{ "admin.files.destroy" }}',
            @endHasAccess
        });
        
        @if(setting('enable_file_download') || setting('enable_file_move') || setting('enable_file_share'))
            var btnShare='';
            var btnDownloadZip='';
            var btnMoveFiles='';
            @if(setting('enable_file_download'))
                var btnDownloadZip='<a class="dropdown-item btn-moreaction" href="#" id="btnDownloadZip"><i class="fas fa-download"></i> {{ clean(trans("files::files.action.download_zip")) }}</a>';
            @endif
            @if(setting('enable_file_move'))
                var btnMoveFiles='<a class="dropdown-item btn-moreaction" href="#" id="btnMove"><i class="fas fa-cut"></i> {{ clean(trans("files::files.action.move_files")) }}</a>';
            @endif
            @if(setting('enable_file_share'))
                var btnShare='<a class="dropdown-item" href="#" id="btnShare"><i class="fas fa-share-square"></i> {{ clean(trans("files::files.action.share")) }}</a>';
            @endif
           
            var btnHTML='<div class="dropdown d-inline-block"><button class="btn btn-primary dropdown-toggle" type="button" id="btn-moreAction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled="disabled">{{ clean(trans("files::files.table.action")) }}</button><div class="dropdown-menu" aria-labelledby="btn-moreAction">'+btnShare+btnMoveFiles+btnDownloadZip+'</div></div>';
            DataTable.customBtn(btnHTML);
           
        @endif
        
        new DataTable('#files-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                /* { data: 'thumbnail', orderable: false, searchable: false, width: '10%' }, */
                { data: 'filename', name: 'filename' },
                /* { data: 'size', name: 'size', orderable: false,searchable: false,},
                { data: 'folder_name', name: 'path' },
                { data: 'uploader', name: 'uploader.first_name' },
                { data: 'created', name: 'created_at' }, */
                { data: 'action', name: 'action',orderable: false, searchable: false,className:"noclickable" },
            ],
        });
        
    })();   
    
</script>
@endpush
