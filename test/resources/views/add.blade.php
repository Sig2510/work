@extends('layouts.app')

@section('content')
  <form method="POST" action="{{ route('todos.store') }}">
    {{ csrf_field() }}
    <input type="hidden" name="todolist_id" value="{{ $todolist_id }}">
    <input type="text" name="desc" class="form-control" value="{{ $todo->desc }}">
    <input type="submit" value="Create!" style="btn btn-success">
  </form>
@endsection
