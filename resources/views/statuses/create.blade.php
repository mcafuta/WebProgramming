@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('application.addNew')</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => '/statuses', 'method' => 'POST']) !!}
                        @include('statuses.form', ['text' => trans('application.newExpense')])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection