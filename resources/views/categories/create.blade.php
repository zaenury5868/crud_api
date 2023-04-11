@extends('layouts.app')

@section('content')
    <h1>Tambah Kategori</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="is_publish">Publish</label>
            <select name="is_publish" id="is_publish" class="form-control @error('is_publish') is-invalid @enderror" required>
                <option value="">-- Select --</option>
                <option value="1" {{ old('is_publish') == 1 ? 'selected' : '' }}>Ya</option>
                <option value="0" {{ old('is_publish') == 0 ? 'selected' : '' }}>Tidak</option>
            </select>
            @error('is_publish')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection