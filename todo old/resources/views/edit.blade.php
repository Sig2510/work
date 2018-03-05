@extends('layouts.app')

@section('content')
<center>
    <b>Edit todo</b>
  <form method="POST" action="{{ route('todos.update') }}" style="width: 800px; height: 800px">
    {{ csrf_field() }}
    <input type="text" name="desc" class="form-control form-control-lg" value="{{ $todo->desc }}">
    <input type="submit" value="Edit" style="btn btn-success">
  </form></center>
@endsection
