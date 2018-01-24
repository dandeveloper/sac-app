@extends('layouts.app') 
@section('content')
<div class="container">
    <h2>Chamado # {{ $ticket->id }}</h2><br />

    <table class="table">
        <tbody>
            <tr>
                <th>Data do Chamado:</th>
                <td>{{ date('d-m-Y', strtotime($ticket->created_at)) }}</td>
            </tr>
            <tr>
                <th>Tipo do Chamado:</th>
                <td>{{ $ticket->type }}</td>
            </tr>
            <tr>
                    <th>Estado:</th>
                    <td>{{ $ticket->state }}</td>
            </tr>
            <tr>
                <th>Motivo:</th>
                <td>{{ $ticket->subject }}</td>
            </tr>
            <tr>
                <th>Detalhes:</th>
                <td colspan="7">{{ $ticket->details }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection