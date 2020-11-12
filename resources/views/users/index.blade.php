
@extends('layouts.app')

@section('content')


<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Users</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="/adduser" class="btn btn-sm btn-primary">Add user</a>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Creation Date</th>
                            <th scope="col">Type</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                {{$thisuser->roles->pluck('name')->first()}}
                            </td>
                            <td class="text-right">
                                <a href="" title="Edit" class="btn btn-primary"><i class="fa fa-pencil-square-o">Edit</i></a>
                            </td>
                        </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>


<script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


<!-- Argon JS -->
<script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>

@endsection