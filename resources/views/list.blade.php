@extends('app')

@section('content')
    <ul class="list-group">
        @foreach ($items as $item)
            <li class="list-group-item">
                {{ $item->description }}
                @if (! empty($item->link))
                    <a href="{{ $item->link }}" target="_blank">link</a>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
