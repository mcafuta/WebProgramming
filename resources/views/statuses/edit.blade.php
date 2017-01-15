@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('application.editExisting')
                    </div>

                    <div class="panel-body">
                        {!! Form::model($status, ['action' => ['StatusController@update', $status->id], 'method' => 'PATCH']) !!}
                        @include('statuses.form', ['text' => trans('application.editExisting')])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection