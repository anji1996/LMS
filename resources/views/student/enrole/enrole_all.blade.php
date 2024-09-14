@extends('student.index')
@section('contain')
    <div class="pagetitle pb-5 pt-5">
        <h1>All Enroled Courses List</h1>
        <a class="btn btn-primary" href="{{ route('student.enroled.add') }}">Enrole For courses</a>
    </div><!-- End Page Title -->



    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Title</th>
                            <th>Lessons</th>
                            {{-- <th>Lesson completed</th> --}}

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $key => $course)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $course->course->title }}</td>
                                <td>
                                    <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        id="{{ $course->course_id }}" onclick="lesssonView(this.id)">
                                        Lessons
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lesson Names List:</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="lessons"></span>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
