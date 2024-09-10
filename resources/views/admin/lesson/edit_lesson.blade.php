@extends('admin.index')
@section('contain')
    <div class="pagetitle pt-5 pb-3">
        <h1>Edit lesson</h1>

    </div><!-- End Page Title -->


    <section class="section dashboard">
        <div class="row">
            <section class="section">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="card">
                            <div class="card-body">
                                <a class="btn btn-primary float-end mt-2" href="{{ route('all.lesson') }}">View All lesson</a>
                                <h5 class="card-title">Edit lessons Details</h5>

                                <!-- Horizontal Form -->
                                <form method="POST" action="{{ route('update.lesson') }}">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$lesson->id}}">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-3">
                                                <label for="inputEmail3" class=" col-form-label">Lesson Title</label>

                                                <input type="text"
                                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                                    value="{{$lesson->title}}">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-3">
                                                <label for="inputEmail3" class=" col-form-label">Course Content</label>

                                                <input type="text"
                                                    class="form-control @error('content') is-invalid @enderror"
                                                    value="{{$lesson->content}}" name="content">
                                                @error('content')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-3">
                                                <label for="inputEmail3" class=" col-form-label">Course Name</label>

                                                <select name="course_id"
                                                    class="form-control @error('course_id') is-invalid @enderror">

                                                    @foreach ($course as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $item->id == $lesson->course_id ? 'selected' : ' ' }}>
                                                            {{ $item->title }}</option>
                                                    @endforeach
                                                </select>

                                                @error('course_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center p-3">
                                        <button type="submit" class="btn btn-primary">update</button>
                                    </div>
                                </form><!-- End Horizontal Form -->

                            </div>
                        </div>


                    </div>
            </section>
        </div>
    </section>
@endsection
