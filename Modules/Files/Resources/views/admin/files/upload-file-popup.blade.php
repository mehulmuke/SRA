<div class="modal fade" id="fileuploadmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3> {{ clean(trans('files::files.upload_files'))}}</h3>
                <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @php
                    $size=auth()->user()->file_size;
                    if($size==''){
                        $size=setting('default_file_size'); 
                    }

                @endphp
        
                @hasAccess('admin.files.create')
                <div class="row" id="upload-file">
                    <div class="col-md-12">
                        <div class="card m-0">
                            <div class="card-body">    
                            @include('files::admin.files.include.upload',["size"=>$size])
                            </div>
                        </div>
                    </div>
                </div>
                @endHasAccess
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ clean(trans('files::files.action.close')) }}</button>
            </div>
        </div>
    </div>
</div>
@push('general')
    <script>
    (function () {
        "use strict";
        CI.maxFileSize = "{{ $size }}"
        CI.AllowExtensions = ".{{ $fileExtension->implode(', .') }}"
        CI.langs['files::files.success_message'] = '{{ clean(trans('files::files.success_message')) }}';
    })();  
    </script>
@endpush