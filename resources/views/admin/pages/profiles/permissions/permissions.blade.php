@extends('adminlte::page')

@section('title', "Permissões do Perfil {$profile->name}")

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" >Perfis</a></li>

    </ol>
    <h1>Permissões do Perfil:  <strong> {{$profile->name}}  </strong> -
         <a href="{{ route('profiles.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> ADD Nova permissão </a> </h1>


@stop

@section('content')


    <div class="card">
        <div class="card-header">

            <form action="{{ route('profiles.search') }}" method="post" class="form form-inline">
                @csrf
                    <div class="form-group">
                        <input type="text" name="filter" placeholder="Pesquisar" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                    </div>
                <button type="submit" class=" btn btn-dark">Filtrar</button>

            </form>

        </div>
        <div class="card-body">
            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                    <th>#</th>

                    <th>Nome</th>
                    <th width= "250" >Ações</th>

                </thead>
                @foreach ( $permissions as $permission )
                    <tbody>
                        <td> {{ $permissions->id }}</td>
                        <td> {{ $permissions->name }}</td>
                        <td style="width: 10px;">
                            <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-info">Ver</a>
                        </td>
                    </tbody>
                @endforeach

            </table>
        </div>

        <div class="card-footer">

            @if (isset($filters))

                {!! $permissions->appends($filters)->links() !!}

                else
                {!! $permissions->links() !!}

            @endif
        </div>
    </div>


@stop

