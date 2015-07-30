@extends('app')


@section('content')
    <ul class="list-group">
			<li class="list-group-item btn"><a class="btn-round red" href="#">red</a></li>
			<li class="list-group-item btn"><a class="btn-round yellow" href="#">yellow</a></li>
			<li class="list-group-item btn"><a class="btn-round blue" href="#">blue</a></li>
        @foreach($members as $member)
            <li class="list-group-item btn"><a class="btn-round green" href="{{ url('/list/' . $member->name) }}">{{ $member->name }}</a></li>
        @endforeach		
    </ul>
@endsection
