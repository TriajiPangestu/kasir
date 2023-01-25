@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Master Category') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-responsive">
                        <thead>
                            <td>#</td>
                            <td>Nama Kategori</td>
                            <td>Action</td>
                        </thead>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route('category.hapus', $category->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Add Category') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('category.store') }}" class="" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="text" name="name" id="name">
                        <input type="button" class="btn btn-sm btn-success" name="simpan" value="simpan">
                        <input type="button" class="btn btn-sm btn-danger" type="button" value="batal">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection