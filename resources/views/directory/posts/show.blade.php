@extends('layouts.app')

@section('content')
<div class="container">

    <h1>post {{ $post->id }}
        <a href="{{ url('admin/posts/' . $post->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit post"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/posts', $post->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete post',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $post->id }}</td>
                </tr>
                <tr><th> Title </th><td> {{ $post->title }} </td></tr><tr><th> Body </th><td> {{ $post->body }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
