<div class="col-lg-4 col-xs-12 col-sm-6">
    <div data-status="{{ $user->id }}" class="panel panel-default">
        <div class="panel-heading">
            {{ $user->name }}
            <div class="pull-right">
                <a href="{{ url('/admin/users/'.$user->id) }}" class="text-primary">Details</a>
            </div>
        </div>

        <div class="panel-body">
            <p>
                <strong>@lang('application.income')</strong>
                <span class="pull-right">{{ $data[$user->id]['incomes'] }}</span>
            </p>
            <p>
                <strong>@lang('application.expense')</strong>
                <span class="pull-right">{{ $data[$user->id]['expenses'] }}</span>
            </p>
            <p>
                <strong>@lang('application.goal')</strong>
                <span class="pull-right">{{ $data[$user->id]['goals'] }}</span>
            </p>
            <hr/>
            <p class="h3">
                <strong>@lang('application.total')</strong>
                <span class="pull-right">{{ $data[$user->id]['total'] }}</span>
            </p>
        </div>
    </div>
</div>