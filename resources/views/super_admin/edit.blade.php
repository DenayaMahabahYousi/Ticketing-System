@extends('layout.template')

@section('content')

<form action='{{ url('super_admin/'.$user->id) }}' method='post'>
@csrf
@method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">    
        <a href="{{ url('super_admin') }}" class="btn btn-secondary">Kembali</a>
        <div class="mb-3 row">
            <p class="col-sm-2 col-form-label">Nama Pelapor</p>
            <div class="col-sm-10">
                <p class="form-control">{{ $user->name }}</textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <p class="col-sm-2 col-form-label">ID</p>
            <div class="col-sm-10">
                <p class="form-control">{{ $user->id }}</textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <p class="col-sm-2 col-form-label">Kategori Pengaduan</p>
            <div class="col-sm-10">
                <p class="form-control">{{ $user->category->name }}</textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <p class="col-sm-2 col-form-label">Deskripsi Pengaduan</p>
            <div class="col-sm-10">
                <p class="form-control">{{ $user->complaint }}</textarea>
            </div>
        </div>

    <!--edit status-->
        <div class="mb-3 row">
            <label for="answer" class="col-sm-2 col-form-label">Tanggapan</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" name="answer" id="answer">{{ $user->answer }}</textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="admin" class="col-sm-2 col-form-label">Tugaskan Kepada</label>
            <div class="col-sm-10">
                <select class="form-control" name="admin" id="admin">
                    <option value=0></option>
                    @foreach ($admin as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="status" class="col-sm-2 col-form-label">Edit Status</label>
            <div class="col-sm-10">
                <select class="form-control" name="status" id="status">
                    @foreach ($status as $item)
                    <option value="{{ $item->id }}">{{ $item->status }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SUBMIT</button></div>
        </div>
    </div>
</form>
@endsection