@extends('layouts/mainAdmin')
@section('title', 'Category | Dashboard')

@section('container')
    <div class="section-header">
        <h1>Kategori | Dashboard</h1>
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
                        <a href="{{ route('category.create') }}" class="btn btn-md btn-success mb-3">Create Category</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm " id="laravel_unique_slug_table">
                                <thead class="">
                    <tr>
                      <th scope=" col">No</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($category as $ct)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $ct->name }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/categories/' . $ct->image) }}"
                                                    class="rounded" style="height: 75px">
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ route('category.edit', $ct->slug) }}">Ubah</a>
                                                <form method="POST" action="{{ route('category.destroy', $ct) }}"
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
                            {{ $category->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
