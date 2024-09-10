@extends('admin.index')
@section('contain')
    <div class="pagetitle pb-5 pt-5">
        <h1>All Courses List</h1>
        <a class="btn btn-primary mt-3 " href="{{ route('add.course') }}">Create Courses</a>
    </div><!-- End Page Title -->



    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($course as $key => $item)
                            <tr>
                                <td>{{ $key++ }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->created_at->format('d F Y') }}</td>
                                <td>
                                    <a href="{{ route('delete.course', $item->id) }}" class="btn btn-danger" id="delete">
                                        Delete
                                    </a>
                                    <a href="{{ route('edit.course', $item->id) }}" class="btn btn-success">
                                        Edit
                                    </a>
                                    <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        id="{{ $item->id }}" onclick="lesssonView(this.id)">
                                        Lessons
                                    </a>

                                </td>
                            </tr>
                        @endforeach


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
