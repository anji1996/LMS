@extends('student.index')
@section('contain')
    <div class="pagetitle pb-5 pt-5">
        <h1>All View Enroled Courses List</h1>
        <a class="btn btn-primary" href="{{ route('student.enroled') }}">Enrole For courses</a>
    </div><!-- End Page Title -->



    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <form action="{{route('student.enroled.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Course title</label>


                        <select name="course_id" class="form-control @error('course_id') is-invalid @enderror">
                            @foreach ($courses as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach


                        </select>
                        @error('record')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>
                    <button type="submit" class="btn btn-primary" >Enrole</button>
                </form>
            </div>
        </div>


    </section>
@endsection
