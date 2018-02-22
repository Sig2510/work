@extends('layouts.app')

@section('content')
<center>  <form method="POST" action="{{ route('todos.store') }}" style="width: 800px; height: 800px">
    {{ csrf_field() }}
    <input type="text" name="desc" class="form-control form-control-lg" value="{{ $todo->desc }}">
    <input type="submit" value="Create!" style="btn btn-success">
  </form></center>
@endsection
