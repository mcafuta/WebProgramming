<div class='form-group'>
    {!! Form::label('name', trans('application.entryName')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('name', trans('application.entryValue')) !!}
    {!! Form::text('value', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('name', trans('application.entryType')) !!}
    <br>
    {!! Form::label('name', trans('application.income')) !!}
    {!! Form::radio('type', 'income') !!}
    {!! Form::label('name', trans('application.expense')) !!}
    {!! Form::radio('type', 'expense') !!}
</div>
<div class='form-group'>
    {!! Form::label('name', trans('application.entryDue')) !!}
    {!! Form::date('due_date', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::submit($text, ['class' => 'btn btn-primary']) !!}
</div>