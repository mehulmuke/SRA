@extends('admin::layout')

@section('title', clean(trans('admin::dashboard.dashboard')))

@section('page-header')
    <h4 class="page-title">{{ clean(trans('admin::dashboard.dashboard')) }}</h4>
@endsection


@section('content')
    @hasAccess('admin.files.index')
        @include('admin::dashboard.include.files')
    @endHasAccess
    @hasAccess('admin.users.index')
        @include('admin::dashboard.include.users')
    @endHasAccess
    @hasAccess('admin.files.index')
        @include('admin::dashboard.include.most-download')
    @endHasAccess

@endsection
