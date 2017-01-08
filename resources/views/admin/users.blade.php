@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">@lang('application.admin') <small>@lang('application.overview')</small></h1>
                @include('layouts.errors')
                @foreach($users as $user)
                    @include('admin.userview')
                @endforeach
            </div>
        </div>
    </div>
@endsection