<!-- resources/views/tenan/edit.blade.php -->

@extends('layout.template')

@section('konten') 
    <form action='{{ url("tenan/{$data->id}") }}' method='post' enctype="multipart/form-data">
        @csrf 
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ route("tenan.index") }}' class="btn btn-secondary"><< Kembali</a>
            <div class="mb-3 row">
                <!-- Your form fields here -->
            </div>
            <div class="mb-3 row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
        </div>
    </form>
@endsection
