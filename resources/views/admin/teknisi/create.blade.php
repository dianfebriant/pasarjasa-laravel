@extends('layouts/mainAdmin')

@section('title', 'Teknicians | Create')
@section('container')
    <div class="section-header">
        <h1>Teknisi | Create</h1>
    </div>
  
    <div class="container mb-5">
        @if (session('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('technician.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">Kategori</label>
                            <select class="form-control  @error('category_id') is-invalid @enderror" name="category_id">
                            <option>- Pilih Kategori -</option>
                            @foreach ($category as $c)
                            @if(old('category_id') == $c->id)
                            <option value="{{ $c->id }}" selected>{{ $c->name}}</option> 
                            @else                 
                            <option value="{{ $c->id }}">{{ $c->name }}</option> 
                            @endif         
                            @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Nama Teknisi</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" placeholder="Masukkan Nama Lengkap">

                            <!-- error message untuk title -->
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Alamat</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="my-editor"
                                rows="5">{{ old('address') }}</textarea>

                            <!-- error message untuk content -->
                            @error('address')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">No. Telepon</label>
                            <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                value="{{ old('telephone') }}" placeholder="Masukkan Nomor Telepon">

                            <!-- error message untuk title -->
                            @error('telephone')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                            
                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                            <!-- error message untuk title -->
                            @error('image')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor');
    </script>
@endpush