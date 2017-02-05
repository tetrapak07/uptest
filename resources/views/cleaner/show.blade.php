@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Cleaner {{ $cleaner->id }}
        <a href="{{ url('cleaner/' . $cleaner->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Cleaner"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['cleaner', $cleaner->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Cleaner',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $cleaner->id }}</td>
                </tr>
                <tr><th> First Name </th><td> {{ $cleaner->first_name }} </td></tr><tr><th> Last Name </th><td> {{ $cleaner->last_name }} </td></tr><tr><th> Quality Score </th><td> {{ $cleaner->quality_score }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
