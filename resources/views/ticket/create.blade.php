@extends('layouts.app') 
@section('content')
<div class="container">
    <h2>Criar um Chamado</h2><br />
    
    <form method="post" action="{{url('ticket')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="form-group col-md-4">
                <label for="type">Tipo do Chamado:</label>
                <select class="form-control" id="type" name="type">
                    @foreach ($types as $type)
                        <option value="{{$type}}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="state">Estado:</label>
                <select class="form-control" id="state" name="state">
                    @foreach ($states as $state)
                        <option value="{{$state}}">{{ $state }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="subject">Motivo:</label>
                <select class="form-control" id="subject" name="subject">
                    @foreach ($subjects as $subject)
                        <option value="{{$subject}}">{{ $subject }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="details">Detalhes do Chamado:</label>
                <textarea class="form-control" name="details" id="details" cols="30" rows="10"></textarea>
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