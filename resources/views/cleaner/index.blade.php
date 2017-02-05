@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Cleaner <a href="{{ url('/cleaner/create') }}" class="btn btn-primary btn-xs" title="Add New Cleaner"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> First Name </th><th> Last Name </th><th> Quality Score </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cleaner as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->first_name }}</td><td>{{ $item->last_name }}</td><td>{{ $item->quality_score }}</td>
                    <td>
                        <a href="{{ url('/cleaner/' . $item->id) }}" class="btn btn-success btn-xs" title="View Cleaner"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/cleaner/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Cleaner"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cleaner', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Cleaner" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Cleaner',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $cleaner->render() !!} </div>
    </div>

</div>
@endsection
