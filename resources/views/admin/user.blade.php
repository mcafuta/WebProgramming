@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">@lang('application.detailedOverview')
                    <small>{{ $user->name }}</small>
                </h1>
                @include('layouts.errors')
                @foreach($user->statuses as $status)
                    <div class="col-lg-4 col-xs-12 col-sm-6">
                        <div data-status="{{ $status->id }}" class="panel panel-default">
                            <div class="panel-heading">
                                {{ $status->name }}
                                @if($status->type == "income")
                                    <span class="label label-primary">@lang('application.income')</span>
                                    @elseif($status->type=="goal")
                                    <span class="label label-success">@lang('application.goal')</span>
                                @else
                                    <span class="label label-danger">@lang('application.expense')</span>
                                @endif
                            </div>

                            <div class="panel-body">
                                <h3 class="text-center">{{ $status->value }}</h3>
                                @lang('application.expire'): <span
                                        class="text-muted"
                                        title="{{ \Carbon\Carbon::parse($status->due_date)->format("d. m. Y") }}"
                                        data-placement="bottom"
                                        data-toggle="tooltip"><strong>{{ \Carbon\Carbon::parse($status->due_date)->diffForHumans() }}</strong></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection