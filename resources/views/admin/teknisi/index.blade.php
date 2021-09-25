@extends('layouts/mainAdmin')
@section('title', 'Technicians | Dashboard')

@section('container')
    <div class="section-header">
        <h1>Teknisi | Dashboard</h1>
    </div>
    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('technician.create') }}" class="btn btn-md btn-success mb-3">Create Technicians</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm " id="laravel_unique_slug_table">
                                <thead class="">
                                <tr>
                                    <th scope=" col">No</th>
                                    <th scope="col">kategori</th>
                                    <th scope="col">Nama Teknisi</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">Foto Teknisi</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($technician as $t)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            {{-- <td>{{ $t->category_id }}</td> --}}
                                            <td>{{ $t->category->name }}</td>
                                            <td>{{ $t->name }}</td>
                                            <td>{{ $t->address }}</td>
                                            <td>{{ $t->telephone }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/teknisi/' . $t->image) }}"
                                                    class="rounded" style="height: 75px">
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ route('technician.edit', $t->slug) }}">Ubah</a>
                                                <form method="POST" action="{{ route('technician.destroy', $t) }}"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Hapus Data?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Belum Tersedia !
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $technician->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
