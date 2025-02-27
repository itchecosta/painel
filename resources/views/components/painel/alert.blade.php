@if (session()->has('success'))
    <div class="mt-2 alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="mt-2 alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if (session()->has('message'))
    <div class="mt-2 alert alert-warning" role="alert">
        {{ session('message') }}
    </div>
@endif


@if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="mt-2 alert alert-danger" role="alert">
                <li>{{ $error }}</li>
            </div>
        @endforeach
@endif