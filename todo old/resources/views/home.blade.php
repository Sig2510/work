@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th>Desc</th>
                          <th>Status</th>
                          <th>Username</th>
                          <th style="width:50px">Actions</th>
                          <th style="width:50px"></th>
                          <th style="width:50px"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($todos as $todo)
                          <tr>
                            <td>
                              {{ $todo->desc }}
                            </td>
                            <td>
                              @if ($todo->status)
                                Done
                              @else
                                Undone
                              @endif
                            </td>
                            <td>
                              <a href="{{ route('users.show', $todo->user->id) }}">{{ $todo->user->name }}</a>
                            </td>
                            <td >
                              <form method="POST" action="{{ route('toggle_status') }}">
                                {{ csrf_field() }}
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $todo->id }}">
                                <input type="submit" class="btn btn-primary" value="Toggle Status">
                              </form>
                            <td >
                               <a href="/todos/{{$todo->id}}/edit" class="btn btn-secondary">
                                 Edit
                               </a>
                            </td>
                            <td >
                               <a href="/todos/{{$todo->id}}/destroy" class="btn btn-danger">
                                 Delete
                               </a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {!!$todos->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
