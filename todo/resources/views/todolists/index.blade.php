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

                    <table class="table">
                      <thead>
                        <tr>
                          <th>Todolist Name</th>
                          <th>Username</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($todolists as $todolist)
                          <tr>
                            <td>
                              <a href="{{ route('todolists.show', $todolist->id) }}">{{ $todolist->name }}</a>
                            </td>
                            <td>
                              <a href="{{ route('users.show', $todolist->user->id) }}">{{ $todolist->user->name }}</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
