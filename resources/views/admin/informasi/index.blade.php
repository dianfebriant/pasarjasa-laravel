@extends('layouts/mainAdmin')
@section('title', 'Information | Dashboard')

@section('container')
    <div class="section-header">
        <h1>Information | Dashboard</h1>
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
                        <a href="{{ route('information.create') }}" class="btn btn-md btn-success mb-3">Create Informasi</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm " id="laravel_unique_slug_table">
                                <thead class="">
                    <tr>
                      <th scope=" col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($information as $info)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $info->name }}</td>
                                            <td>{!!$info->body !!}</td>
                                            <td>
                                                <img src="{{ asset('uploads/information/' . $info->image) }}"
                                                    class="rounded" style="height: 75px">
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ route('information.edit', $info->slug) }}">Ubah</a>
                                                <form method="POST" action="{{ route('information.destroy', $info) }}"
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
                            {{ $information->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
