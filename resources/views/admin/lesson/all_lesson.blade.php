@extends('admin.index')
@section('contain')
    <div class="pagetitle pb-5 pt-5">
        <h1>All Lesson List</h1>
        <a class="btn btn-primary mt-3 " href="{{route('add.lesson')}}">Create Lessons</a>
    </div><!-- End Page Title -->



    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Created At</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lesson as $key => $item)
                            <tr>
                                <td>{{ $key++ }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->content }}</td>
                                <td>{{ $item->created_at->format('d F Y') }}</td>
                                <td>
                                    <a href="{{route('delete.lesson',$item->id)}}" class="btn btn-danger" id="delete">
                                        Delete
                                    </a>
                                    <a href="{{route('edit.lesson',$item->id)}}" class="btn btn-success">
                                        Edit
                                    </a>


                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
