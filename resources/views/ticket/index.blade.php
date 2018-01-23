@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID do Chamado</th>
                    <th>Data</th>
                    <th>Estado</th>
                    <th>Motivo</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->type }}</td>                        
                        <td>{{ $ticket->state }}</td>
                        <td>{{ $ticket->subject }}</td>
                        <td><a href="{{ action('TicketController@edit', $ticket['id']) }}"><i class="glyphicon glyphicon-edit"></i> Editar Chamado</a></td>
                        <td>
                            <form action="{{action('TicketController@destroy', $ticket['id'])}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection