@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $event->title }}</div>

                    <div class="panel-body">
                        <p><strong>Date:</strong> {{ $event->date }}</p>
                        <p><strong>Location:</strong> {{ $event->location }}</p>
                        <p><strong>Description:</strong> {{ $event->description }}</p>
                        <p><strong>Category:</strong> {{ $event->category->name }}</p>
                        <p><strong>Attendees:</strong></p>
                        <table></table>
                        @foreach ($attendees as $attendee)
                            <tr>
                                <td>{{ $attendee->name }}</td>
                                <td>{{ $attendee->email }}</td>
                            </tr>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('events.index') }}" class="btn btn-primary mt-3">Back to events</a>
    </div>
@endsection
