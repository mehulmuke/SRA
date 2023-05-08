<div class="card">
    <div class="card-header">
        <div class="card-head-row card-tools-still-right">
            <h4 class="card-title">{{ clean(trans("admin::dashboard.most_downloaded_files")) }}</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive table-hover table-sales">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ clean(trans("admin::dashboard.table.file")) }}</th>
                                <th>{{ clean(trans("admin::dashboard.table.size")) }}</th>
                                <th>{{ clean(trans("admin::dashboard.table.downloads_count")) }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                                $inc=0;
                            @endphp
                            @foreach($mostDownloadFiles as $file)
                            @php 
                                
                                $inc++;
                            @endphp
                            
                            <tr>
                                <td>
                                {{ $inc }}
                                </td>
                                <td>{{ $file->filename }}</td>
                                <td>
                                    {{ display_filesize($file->size) }}
                                </td>
                                <td>
                                    {{ $file->download }} {{ clean(trans("admin::dashboard.table.downloads"))  }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>