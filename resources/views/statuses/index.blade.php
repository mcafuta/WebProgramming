@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">@lang('application.incomes&expenses')
                    <div class="pull-right"><a href="{{ url("/statuses/create") }}"
                                               class="btn btn-success">@lang('application.newExpense')</a></div>
                </h1>
                @include('layouts.errors')
                @foreach($statuses as $status)
                    <div class="col-lg-4 col-xs-12 col-sm-6">
                        <div data-status="{{ $status->id }}"
                             class="panel panel-default @if($status->type == "goal" && $status->expired()) panel-danger @endif">
                            <div class="panel-heading">
                                {{ $status->name }}
                                @if($status->type == "income")
                                    <span class="label label-primary">@lang('application.income')</span>
                                @elseif($status->type=="goal")
                                    <span class="label label-success">@lang('application.goal')</span>
                                @else
                                    <span class="label label-danger">@lang('application.expense')</span>
                                @endif
                                <div class="pull-right">
                                    @can('update', $status)
                                        <a href="{{ action('StatusController@edit', $status->id) }}"

                                           class="text-primary">@lang('application.edit')</a>
                                    @endcan
                                    @can('delete', $status)
                                        <span class="pointer text-danger"
                                              onclick="deleteStatus({{ $status->id }});">@lang('application.delete')</span>
                                    @endcan
                                </div>
                            </div>

                            <div class="panel-body">
                                <h3 class="text-center">{{ $status->value }} €</h3>
                                @if($status->type == "goal")
                                    @lang('application.expire'): <span
                                            class="text-muted"
                                            title="{{ \Carbon\Carbon::parse($status->due_date)->format("d. m. Y") }}"
                                            data-placement="bottom"
                                            data-toggle="tooltip"><strong>{{ \Carbon\Carbon::parse($status->due_date)->diffForHumans() }}</strong></span>
                                @else
                                    @lang('application.added'): <span
                                            class="text-muted"
                                            title="{{ \Carbon\Carbon::parse($status->created_at)->format("d. m. Y") }}"
                                            data-placement="bottom"
                                            data-toggle="tooltip"><strong>{{ \Carbon\Carbon::parse($status->created_at)->diffForHumans() }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function deleteStatus(id) {
            $.ajax({
                url: '/statuses/' + id,
                type: 'DELETE',
                data: {'_token': '{{ csrf_token() }}'},
                success: function (cb) {
                    if (cb === "success") {
                        $("div[data-status=" + id + "]").remove();
                    }
                }
            });
        }
    </script>
@endsection