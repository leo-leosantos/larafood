@if ($errors->any())
    <div class="alert alert-warning">
        @foreach ( $errors->all() as $error )
                <p>{{ $error }}</p>
        @endforeach
    </div>


    @endif


@if (session('success'))
    @section('plugins.Sweetalert2', true)

@endif





  @if (session('message'))
    <div class=" alert alert-success">
        {{ session('message') }}
    </div>
@endif




@if (session('error'))
    <div class=" alert alert-danger">
        {{ session('error') }}
    </div>
@endif


@if (session('info'))
    <div class=" alert alert-info">
        {{ session('info') }}
    </div>
@endif

