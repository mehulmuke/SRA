@extends('installer.layout')

@section('content')
<div class="tab-content">
    <div class="tab-pane active" id="details">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="info-text"> Application has been successfully installed</h2>
            </div>
            <div class="col-sm-12 text-center">
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-next btn-fill btn-danger btn-wd" target="_blank">
                    
                    <i class="fa fa-cog" aria-hidden="true"></i><br>
                    Go to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>    
@endsection
