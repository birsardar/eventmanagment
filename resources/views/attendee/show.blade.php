@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $attendee->name }}</div>

                    <div class="panel-body">
                        <p><strong>Email:</strong> {{ $attendee->email }}</p>



                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('attendee.index') }}" class="btn btn-primary mt-3">Back to Attendee</a>
    </div>
@endsection
