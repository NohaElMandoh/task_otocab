@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">


                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(Auth::user()->status == 1 && Auth::user()->activity == 1)
                    Your Account Approved
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key=>$user)

                            <tr>
                                <td><a href="#">{{$key+1}}</a></td>
                                <td>{!!$user->name!!}</td>


                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    @elseif(Auth::user()->status == 0)
                    You Account Pending
                    @endif

                    @if(Auth::user()->activity == 1)

                    You are verified
                    @else
                    You are blocked please update your <a href="{{route('admin.profile')}}"> profile</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection