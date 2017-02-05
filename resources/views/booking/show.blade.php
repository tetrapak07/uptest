@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Booking {{ $booking->id }}
        <a href="{{ url('booking/' . $booking->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Booking"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['booking', $booking->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Booking',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $booking->id }}</td>
                </tr>
                <tr><th> Date </th><td> {{ $booking->date }} </td></tr><tr><th> Customer Id </th><td> {{ $booking->customer_id }} </td></tr><tr><th> Cleaner Id </th><td> {{ $booking->cleaner_id }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
