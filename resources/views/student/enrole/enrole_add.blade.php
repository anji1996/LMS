@extends('student.index')
@section('contain')
    <div class="pagetitle pb-5 pt-5">
        <h1>All View Enroled Courses List</h1>

    </div><!-- End Page Title -->



    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <form action="{{ route('student.enroled.store') }}" method="post">
                    @csrf
                    <div class="mb-3 p-3">
                        <label for="" class="form-label">Course title</label>


                        <select name="course_id" class="form-control @error('course_id') is-invalid @enderror">
                            @foreach ($courses as $item)

                            {{-- start Get auth user --}}
                                <?php
                                $userId = Auth::user()->id;
                                $user = App\Models\Enrollment::where('student_id', $item->id)->get();
                                ?>
                                @if($user)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endif

                            {{-- End Get auth user --}}
                            @endforeach
                        </select>
                        @error('course_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Enrole</button>
                </form>
            </div>
        </div>


    </section>
@endsection
