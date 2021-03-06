@extends(Auth::user()->default_layout)
@section('title')
All {{ $pluralName }}
@endsection
@section('table_name', 'all-'.$tableName)
@section('content')
@include('global.includes.show_alerts')
<a class="btn btn-default" href="{{ action($controllerName.'@create') }}">Create new {{ $singleName }}</a>
<hr>
<div class="dataTable_wrapper">
  <table class="table table-striped table-bordered table-hover" id="all-{{ $tableName }}">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Name</th>
        <th>Description</th>
      </tr>
    </tfoot>
    <tbody>
      @foreach ($entities as $entity)
      <tr class="clickable" href="{{ url($indexUrl, ['name' => $entity->name]) }}">
        <th>{{ $entity->name }}</th>
        <th>{{ $entity->description }}</th>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<!-- /.table-responsive -->
@include('global.includes.large_table_js')
@endsection
@stop