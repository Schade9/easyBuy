@extends('layouts.master2')

@section('content')
<div class="container-fluid p-0">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input. <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 class="h3 mb-3">Edit Category</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"></h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" name="category" value="{{ $category->category }}" class="form-control" placeholder="Category Name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label w-100">Upload Image</label>
                            <input type="file" name="imgpath">
                            <img src="public/categoryimages/{{ $category->imgpath }}" alt="img">
                            <small class="form-text text-muted">Example block-level help text here.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>   
@endsection
