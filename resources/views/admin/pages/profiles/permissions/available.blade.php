@extends('adminlte::page')

@section('title', "Permissões disponíveis Perfil {$profile->name}")

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>

    </ol>
    <h1>Permissões disponíveis Perfil: <strong> {{ $profile->name }} </strong> </h1>

@stop

@section('content')


    <div class="card">
        <div class="card-header">

            <form action="{{ route('profiles.permissions.available', $profile->id) }}" method="post" class="form form-inline">
                @csrf
                <div class="form-group">
                    <input type="text" name="filter" placeholder="Pesquisar" class="form-control"
                        value="{{ $filters['filter'] ?? '' }}">
                </div>
                <button type="submit" class=" btn btn-dark">Filtrar</button>

            </form>

        </div>
        <div class="card-body">

            <table class="table table-condensed">
                <thead>
                    <th>id</th>
                    <th width="50px">#</th>
                    <th>Nome</th>
                </thead>
                <tbody>
                    <form action="{{ route('profiles.permissions.attach', $profile->id) }}" method="POST">
                        @csrf

                        @foreach ($permissions as $permission)
                            <tr>
                                <td> {{ $permission->id }}</td>

                                <td>
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                        id="">
                                </td>

                                <td> {{ $permission->name }}</td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="500">

                                @include('admin.includes.alerts')
                                    <button type="submit" class=" btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>

            </table>
        </div>

        <div class="card-footer">

            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}

                @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>


@stop
