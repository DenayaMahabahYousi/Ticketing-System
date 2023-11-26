@extends('layout.template')

@section('content')
@if ($errors -> any())
    <div class="pt-3">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">Login Admin</div>
			<div class="card-body">
                <form action='{{ route('auth.validate_login') }}' method='post'>
                    @csrf
                    <div class="form-group mb-3">
						<input type="text" name="id" class="form-control" placeholder="ID" />
						@if($errors->has('id'))
							<span class="text-danger">{{ $errors->first('id') }}</span>
						@endif
					</div>
					<div class="form-group mb-3">
						<input type="password" name="password" class="form-control" placeholder="Password" />
						@if($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
					</div>
					<div class="d-grid mx-auto">
						<button type="submit" class="btn btn-dark btn-block">Login</button>
                        <br>
                        <a href="{{ url('user') }}" class="btn btn-secondary">Lanjutkan sebagai User</a>
					</div>
                </form>
@endsection