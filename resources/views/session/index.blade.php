@extends('layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="col-6 mt-2">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>IP</th>
                                <th>DATE</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach($userSessions as $session )
                                    <td>{{$session->ip_address}}</td>
                                    <td>{{$session->last_activity}}</td>
                                    <td>
                                        <form action="{{route('session.destroy', $session->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="dropdown-center">
                            <a href="{{route('session.except')}}" class="btn btn-block btn-primary">завершить другие сессии</a>
                        </div>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection
