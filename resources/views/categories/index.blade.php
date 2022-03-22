@extends('layouts.master2')

@section('content')
<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        @if ($message = Session::get('success'))
        
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Categories</strong> Dashboard</h3>
        </div>

        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('categories.create') }}"><button type="button" class="btn btn-primary">Add Category</button></a></li>
                    {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboards</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Analytics</li> --}}
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="w-100">
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-6 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h2>{{ $category->category }}</h2>
                            <img class="card-img-top" src="{{ url('images/'.$category->imgpath) }}" height="533" width="800" alt="img"><br><br>
                            <div class="mb-1">
                                <a href="{{ route('categories.edit', $category->id) }}"><button class="btn btn-primary"><i class="far fa-edit"></i> Edit</button></a>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#defaultModalDanger_{{ $category->id }}"><i data-feather="trash-2"></i> Delete</button>
                                {{-- modal --}}
                                <div class="modal fade" id="defaultModalDanger_{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body m-3">
                                                <p class="mb-0">Delete category {{ $category->category }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end of modal --}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-6 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h2>Electronics</h2>
                            <img class="card-img-top" src="{{ URL::asset('static/dash/img/photos/unsplash-2.jpg') }}" alt="Unsplash"><br><br>
                            <div class="mb-1">
                                <a href=""><button class="btn btn-primary"><i class="far fa-edit"></i> Edit</button></a>
                                <a href=""><button class="btn btn-danger"><i data-feather="trash-2"></i> Delete</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection