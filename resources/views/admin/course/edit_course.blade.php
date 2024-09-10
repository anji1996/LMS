@extends('admin.index')
@section('contain')
    <div class="pagetitle pt-5 pb-3">
        <h1>Edit Courses</h1>

    </div><!-- End Page Title -->


    <section class="section dashboard">
        <div class="row">
            <section class="section">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="card">
                            <div class="card-body">
                                <a class="btn btn-primary float-end mt-2" href="{{ route('all.course') }}">View All
                                    Courses</a>
                                <h5 class="card-title">Edit Course Details</h5>

                                <!-- Horizontal Form -->
                                <form method="POST" action="{{ route('update.course') }}">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $course->id }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-3">
                                                <label for="inputEmail3" class=" col-form-label">Course Title</label>

                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="title"
                                                    value="{{ $course->title }}">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-3">
                                                <label for="inputEmail3" class=" col-form-label">Course Category</label>

                                                <input type="text"
                                                    class="form-control @error('category') is-invalid @enderror"
                                                    name="category" value="{{ $course->category }}">
                                                @error('category')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-3">
                                                <label for="inputEmail3" class=" col-form-label">Course Description</label>
                                                <input type="text"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    name="description" value="{{ $course->description }}">
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center p-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form><!-- End Horizontal Form -->

                            </div>
                        </div>


                    </div>
            </section>
        </div>
    </section>
@endsection
