@extends('layouts.app')

@section('content')
    <h1>Kategori</h1>

    <div class="my-3">
        <form action="{{ route('categories.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search category by name" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </div>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Publish</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->is_publish ? 'Ya' : 'Tidak' }}</td>
                    <td>
                        
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">kategori tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection