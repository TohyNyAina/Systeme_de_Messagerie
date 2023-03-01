@extends('layouts.app')

@section('content')
<div class="col-md-3">
        @include('conversations.users', ['users'=> $users])
</div>
@endsection