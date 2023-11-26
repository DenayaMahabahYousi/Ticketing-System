@extends('layout.template')

@section('nav-menu')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin') }}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/forme') }}">Ditugaskan Kepada Saya</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/software') }}">Pengaduan Software</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/hardware') }}">Pengaduan Hardware</a>
    </li>
@endsection

@section('content')
<h2 class="text-center">Pengaduan Kategori Hardware</h2>
<!-- START DATA -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-auto">ID</th>
                <th class="col-auto">Status</th>
                <th class="col-auto">Kategori</th>
                <th class="col-md-3">Deskripsi Pengaduan</th>
                <th class="col-auto">Nama Pelapor</th>
                <th class="col-md-3">Tanggapan</th>
                <th class="col-auto">Tanggal dilaporkan</th>
                <th class="col-auto">Tanggal diproses</th>
                <th class="col-auto">Tanggal selesai</th>
                <th class="col-auto">Ditugaskan Kepada</th>
                <th class="col-auto">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->status->status }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->complaint }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->answer }}</td>
                    <td>{{ $item->opened_at }}</td>
                    <td>{{ $item->process_at }}</td>
                    <td>{{ $item->closed_at }}</td>
                    @if (is_null($item->admin?->name))
                        <td>-</td>
                    @else
                        <td>{{ $item->admin?->name }}</td>
                    @endif
                    <td>
                        <a href='{{ url('admin/'.$item->id.'/edit')}}' class="btn btn-warning btn-sm">Tanggapi/Ubah Status</a>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('admin/'.$item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- AKHIR DATA -->
@endsection        