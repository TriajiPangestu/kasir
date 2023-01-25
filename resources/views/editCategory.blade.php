@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Edit Category') }}</div>
                <div class="card-body">
                    <form action="{{ route('category.update', $categories->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama Kategori </label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $categories->name }}"> <br>
                        </div>
                        <input type="submit" class="btn btn-sm btn-success" value="simpan">
                        <input href="{{ route('category.index') }}" type="button" class="btn btn-sm btn-danger" value="batal">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection