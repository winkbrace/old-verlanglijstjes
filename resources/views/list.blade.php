@extends('app')

@section('content')
    @foreach($members as $member)
        {{ $member->name }}
    @endforeach
@endsection
