@extends('layouts.app')

@section('content')
  <form method="POST" action="{{ route('todolists.store') }}">
    {{ csrf_field() }}
    <input type="text" name="name" class="form-control">

    <div>
      Is private?
      <input type="checkbox" name="private" value="1">
    </div>
    <input type="submit" value="Create!" style="btn btn-success">
  </form>
@endsection
