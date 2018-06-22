@extends('layout')

@section('title') Recherche @endsection

@section('pageTitle')  @endsection

@section('content')
    @if(isset($users))
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $key=>$user)
                <tr>
                    <th scope="row">{{ $key +1}}</th>
                        <td>{{ $user->name}}</td>
                    <td>
                        {!! Form::open(['url' => 'add/'.$user->id.'']) !!}
                            @if($user->status == -1)
                                {!! Form::submit('Ajouter',array('class' => 'btn btn-success')) !!}
                            @elseif($user->status == 0)
                                {!! Form::submit('Demande en attente',array('class' => 'btn btn-success','disabled' => 'disabled')) !!}
                            @elseif($user->status == 1)
                                <a href="{{ url('sendMessage/'.$user->id) }}" class="btn btn-success">Envoyez un message</a>
                            @endif
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            <tbody>
        </table>


    @endif

    @if(isset($error))
        <p>{{$error }}</p>
    @endif


@endsection

