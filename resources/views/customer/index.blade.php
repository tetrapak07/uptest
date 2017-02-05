@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Customer <a href="{{ url('/customer/create') }}" class="btn btn-primary btn-xs" title="Add New Customer"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> First Name </th><th> Last Name </th><th> Phone Number </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($customer as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->first_name }}</td><td>{{ $item->last_name }}</td><td>{{ $item->phone_number }}</td>
                    <td>
                        <a href="{{ url('/customer/' . $item->id) }}" class="btn btn-success btn-xs" title="View Customer"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/customer/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Customer"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/customer', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Customer" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Customer',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $customer->render() !!} </div>
    </div>

</div>
@endsection
