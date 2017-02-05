@extends('layouts.app')

@section('content')
<div class="container">

    <h1>City {{ $city->id }}
        <a href="{{ url('city/' . $city->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit City"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['city', $city->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete City',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $city->id }}</td>
                </tr>
                <tr><th> Name </th><td> {{ $city->name }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
