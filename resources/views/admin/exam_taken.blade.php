@extends('layouts.dasboardtemp')
@section('title', 'Exams Completed')
@section('admincontent')

    <!-- /.content-header -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Exams</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Exam</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">

                                <div class="card-body">
                                    <table class="table table-striped table-bordered table-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Exam title</th>
                                                <th>Exam Date</th>
                                                <th>Status</th>
                                                <th>Result</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($results as $attempt)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $attempt->exam->title ?? 'Unknown Exam' }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($attempt->updated_at)->format('d M Y H:i') }}
                                                    </td>
                                                    <td>{{ $attempt->status }}</td>
                                                    <td>
                                                        {{-- @if ($attempt->exam_joined == 1) --}}
                                                            <a href="{{ url('/view_result', ['data' => $attempt]) }}"
                                                                class="btn btn-info btn-sm">View Result</a>
                                                        {{-- @endif --}}
                                                    </td>
                                                    <td>
                                                        {{-- @if (\Carbon\Carbon::parse($attempt->exam_date)->isToday())
                                                            @if ($attempt->exam_joined == 0)
                                                                <a href="{{ url('/join_exam/' . $attempt->exam_id) }}"
                                                                    class="btn btn-primary btn-sm">Join Exam</a>
                                                            @else --}}
                                                                <a href="{{ url('/view_answer', ['data' => $attempt])  }}"
                                                                    class="btn btn-primary btn-sm">View Answers</a>
                                                            {{-- @endif --}}
                                                        {{-- @endif --}}
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content-header -->

        <!-- Modal -->



    @endsection
