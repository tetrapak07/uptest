@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Customer {{ $customer->id }}
        <a href="{{ url('customer/' . $customer->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Customer"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['customer', $customer->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Customer',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $customer->id }}</td>
                </tr>
                <tr><th> First Name </th><td> {{ $customer->first_name }} </td></tr><tr><th> Last Name </th><td> {{ $customer->last_name }} </td></tr><tr><th> Phone Number </th><td> {{ $customer->phone_number }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
