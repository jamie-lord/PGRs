@extends('staff.layouts.default')
@section('title')
Edit supervisor record for {{ $supervisor->student->user->full_name }}
@endsection
@section('content')
<div class="col-lg-6 col-md-6">
    @include('global.includes.show_errors')
    {!! Form::model($supervisor, ['method' => 'PATCH', 'action' => array('SupervisorsController@update', 'id' => $supervisor->id)]) !!}
    <fieldset>
        <div class="form-group required">
            {!! Form::label('Supervisor') !!}
            {!! Form::select('staff_id', $staffList, $supervisor->staff->id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group required @if ($errors->has('start')) has-error @endif">
            {!! Form::label('Start date') !!}
            {!! Form::input('date', 'start', date('Y-m-d'), ['class' => 'form-control']) !!}
            @if ($errors->has('start')) <p class="help-block">{{ $errors->first('start') }}</p> @endif
        </div>
        <div class="form-group @if ($errors->has('end')) has-error @endif">
            {!! Form::label('End date') !!}
            <div class="alert alert-info">If the supervision is ongoing/current please ensure the end date is blank.</div>
            <div class="input-group">
                {!! Form::input('date', 'end', date('Y-m-d'), ['class' => 'form-control', 'id' => 'end']) !!}
                <span class="input-group-btn">
                    <button type="button" class="btn btn-default" onclick="clearEnd();">Clear</button>
                </span>
            </div>
            @if ($errors->has('end')) <p class="help-block">{{ $errors->first('end') }}</p> @endif
        </div>
        <div class="form-group required @if ($errors->has('order')) has-error @endif">
            {!! Form::label('Order') !!}
            {!! Form::text('order', null, ['class' => 'form-control', 'placeholder' => '1']) !!}
            @if ($errors->has('order')) <p class="help-block">{{ $errors->first('order') }}</p> @endif
        </div>
        <div class="form-group required">
            {!! Form::submit('Update supervision record', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </fieldset>
    {!! Form::close() !!}
</div>
<script type="text/javascript">
    function clearEnd()  
    {
        end.value = "";
    }
</script>
@endsection
@stop