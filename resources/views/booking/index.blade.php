@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Booking <a href="{{ url('/booking/create') }}" class="btn btn-primary btn-xs" title="Add New Booking"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Date </th><th> Customer Id </th><th> Cleaner Id </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($booking as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->date }}</td><td>{{ $item->customer_id }}</td><td>{{ $item->cleaner_id }}</td>
                    <td>
                        <a href="{{ url('/booking/' . $item->id) }}" class="btn btn-success btn-xs" title="View Booking"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/booking/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Booking"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/booking', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Booking" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Booking',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $booking->render() !!} </div>
    </div>

</div>
@endsection
