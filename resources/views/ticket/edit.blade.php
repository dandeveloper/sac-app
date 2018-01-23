@extends('layouts.app') 
@section('content')
<div class="container">
    <h2>Criar um Chamado</h2><br />
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br /> @endif @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <form method="post" action="{{action('TicketController@update', $id)}}">
        {{csrf_field()}}
        <div class="row">
            <div class="form-group col-md-4">
                <label for="type">Tipo do Chamado:</label>
                <select class="form-control" id="type" name="type">
                    @foreach ($types as $type)
                        @if( $ticket->type === $type)
                            <option value="{{$type}}" selected>{{ $type }}</option>
                        @else
                            <option value="{{$type}}">{{ $type }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="state">Estado:</label>
                <select class="form-control" id="state" name="state">
                    @foreach ($states as $state)
                        @if( $ticket->state === $state)
                            <option value="{{$state}}" selected>{{ $state }}</option>
                        @else
                            <option value="{{$state}}">{{ $state }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="subject">Motivo:</label>
                <select class="form-control" id="subject" name="subject">
                    @foreach ($subjects as $subject)
                        @if( $ticket->subject === $subject)
                            <option value="{{$subject}}" selected>{{ $subject }}</option>
                        @else
                            <option value="{{$subject}}">{{ $subject }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="details">Detalhes do Chamado:</label>
                <textarea class="form-control" name="details" id="details" cols="30" rows="10">{{ $ticket->details }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-success">Salvar Chamado</button>
            </div>
        </div>
    </form>
</div>
@endsection