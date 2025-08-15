@extends('layouts.dasboardtemp')
@section('title', 'Exams Completed')
@section('admincontent')
<style>
     .primary_color {
            background-color: #1A69AF;
        }
</style>
    <!-- /.content-header -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="mt-2">Exams</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">

                                <div class="card-body">
                                    @if ($results->isNotEmpty())
                                        <div class="table-responsive">
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
                                                            <td>
                                                                <p style="width:10rem">
                                                                    {{ \Carbon\Carbon::parse($attempt->updated_at)->format('d M Y H:i') }}
                                                                </p>
                                                            </td>
                                                            <td>Completed</td>
                                                            <td>
                                                                <a href="{{ url('/view_result', ['data' => $attempt]) }}"
                                                                    class="btn btn-secondary btn-sm" style="width:6rem">View
                                                                    Result</a>
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('/view_answer', ['data' => $attempt]) }}"
                                                                    class="btn btn-primary btn-sm" style="width:7rem">View
                                                                    Answers</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>
                                        </div>
                                    @else
                                        {{-- <p class="text-center">No Exams attempted yet!</p> --}}
                                        <div class="alert alert-primary text-center">
                                            <h4>No Exams Found</h4>
                                            <p>You haven’t attempted any exams yet. Once you do, your results will appear
                                                here.</p>
                                            <a href="/adexams" class="btn primary_color text-light">Browse Available Exams</a>
                                        </div>
                                    @endif
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
