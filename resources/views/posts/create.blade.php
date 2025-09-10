@extends('layouts.app')

@section('title', 'Posts create')

@section('content')

@if (session('success'))
    @push('scripts')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Done!',
                text: "{{ session('success') }}",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endpush
@endif



<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div class="input-group mb-3">
    <span class="input-group-text">@</span>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Title" name="title" value="{{ old('title') }}">
    </div>
    </div>

    <div class="form-floating">
    <textarea class="form-control" placeholder="Leave a description here" id="floatingTextarea2" style="height: 100px" name="description">{{ old('description') }}</textarea>
    <label for="floatingTextarea2">description</label>
    </div>

    <div class="input-group mt-3">
    <label class="input-group-text" for="inputGroupSelect01">Post Creator</label>
    <select class="form-select" id="inputGroupSelect01" name="post_creator">
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    </div>

    <div class="col-12 mt-5">
        <button class="btn btn-primary" type="submit">Submit Post</button>
    </div>

</form>

@endsection
