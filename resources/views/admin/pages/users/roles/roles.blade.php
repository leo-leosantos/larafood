@extends('adminlte::page')

@section('title', "Usuários do Usuário {$user->name}")

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" class="active">Users</a></li>

    </ol>
    <h1>Usuários do Usuário: <strong> {{ $user->name }} </strong> -
        <a href="{{ route('users.roles.available', $user->id) }}" class="btn btn-dark"><i
                class="fas fa-plus-square"></i> ADD NOVO CARGO </a>
    </h1>


@stop

@section('content')


    <div class="card">
        <div class="card-body">
            @include('admin.includes.toastr')
            <table class="table table-condensed">
                <thead>
                    <th>#</th>
                    <th>Nome</th>
                    <th width="50">Ações</th>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td> {{ $role->id }}</td>
                            <td> {{ $role->name }}</td>
                            <td style="width: 10px;">
                                <a href="{{ route('users.roles.detach', [$user->id,$role->id ]) }}" class="btn btn-danger">DESVINCULAR</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">

            @if (isset($filters))
                {!! $roles->appends($filters)->links() !!}

                @else
                {!! $roles->links() !!}
            @endif
        </div>
    </div>


@stop
