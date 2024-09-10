@extends('admin.index')
@section('contain')
    <div class="pagetitle pt-5 pb-3">
        <h1>Add lesson</h1>

    </div><!-- End Page Title -->


    <section class="section dashboard">
        <div class="row">
            <section class="section">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="card">
                            <div class="card-body">
                                <a class="btn btn-primary float-end mt-2" href="{{ route('all.lesson') }}">View All lesson</a>
                                <h5 class="card-title">Add lessons Details</h5>

                                <!-- Horizontal Form -->
                                <form method="POST" action="{{ route('store.lesson') }}">
                                    @csrf


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-3">
                                                <label for="inputEmail3" class=" col-form-label">Lesson Title</label>

                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="title">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-3">
                                                <label for="inputEmail3" class=" col-form-label">Lesson Content</label>

                                                <input type="text"
                                                    class="form-control @error('content') is-invalid @enderror"
                                                    name="content">
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
                                                    <option value="">Select Course</option>
                                                    @foreach ($course as $item)
                                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                </select>

                                                @error('course_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center p-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form><!-- End Horizontal Form -->

                            </div>
                        </div>


                    </div>
            </section>
        </div>
    </section>
@endsection
