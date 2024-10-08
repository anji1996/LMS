@extends('admin.index')
@section('contain')
    <div class="pagetitle pb-5 pt-5">
        <h1>All Enroled Student</h1>

    </div><!-- End Page Title -->



    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Joined At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key => $item)
                            <tr>
                                <td>{{ $key++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at->format('d F Y') }}</td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        </div>

    </section>


@endsection
