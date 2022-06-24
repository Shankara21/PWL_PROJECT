@extends('homepage.layouts.main')

@section('content')
<table>
    <tbody>
        @foreach ($order as $item)
        @if ($item->order->status == 1)
        <tr>
            <td>{{ $item -> id }}</td>
            <td>{{ $item -> order -> user -> name }}</td>
            <td>{{ $item -> order -> bank -> name }}</td>
            <td>{{ $item -> total_bayar }}</td>
        </tr>
        @elseif ($item->order->status == 2 && $item->order->user_id == Auth::user()->id)
        <tr class="text-danger">
            <td>{{ $item -> id }}</td>
            <td>{{ $item -> order -> user -> name }}</td>
            <td>{{ $item -> order -> bank -> name }}</td>
            <td>{{ $item -> total_bayar }}</td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
@endsection