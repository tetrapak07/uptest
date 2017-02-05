@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Posts <a href="{{ url('/admin/posts/create') }}" class="btn btn-primary btn-xs" title="Add New post"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Title </th><th> Body </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title }}</td><td>{{ $item->body }}</td>
                    <td>
                        <a href="{{ url('/admin/posts/' . $item->id) }}" class="btn btn-success btn-xs" title="View post"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/posts/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit post"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/posts', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete post" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete post',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $posts->render() !!} </div>
    </div>

</div>
@endsection
