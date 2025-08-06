@extends('layouts.dasboardtemp')
@section('title', 'Result')
@section('admincontent')

    <!-- /.content-header -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Result</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2" id="topButton">
                                <a href="/exam_taken" class="btn btn-secondary p-1 px-5 shadow">Back</a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-sm-6">
                        <h1 class="mt-2">Result</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2" id="topButton">
                                <a href="/adexams" class="btn btn-secondary p-1 px-5 shadow">Back</a>
                            </div>
                        </div>
                    </div> --}}
                    <!-- /.col -->
                    {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Exam</li>
            </ol>
          </div> --}}
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">

                            <!-- Default box -->
                            <!-- /.card -->
                            <div class="card mt-4">

                                <div class="card-body">
                                    <h2>Student information</h2>
                                    <table class="table">
                                        <tr>
                                            <td>Name : </td>
                                            <td>{{ $student_info->first_name }} {{ $student_info->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>E-mail : </td>
                                            <td>{{ $student_info->email }}</td>
                                        </tr>
                                        {{-- <tr>
                                <td>DOB : </td>
                                <td>{{ $student_info->dob}}</td>
                            </tr> --}}
                                        <tr>
                                            <td>Exam name : </td>
                                            <td>{{ $exam_info->title }}</td>
                                        </tr>
                                        <tr>
                                            <td>Exam date : </td>
                                            <td>{{ \Carbon\Carbon::parse($result_info->updated_at)->format('d M Y H:i') }}
                                            </td>
                                        </tr>
                                    </table>
                                    <h2>Result info</h2>
                                    <table class="table">
                                        <tr>
                                            <td>Correst ans : </td>
                                            <td>{{ $result_info->yes_ans }}</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong ans : </td>
                                            <td>{{ $result_info->no_ans }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total : </td>
                                            <td>{{ $rounded = round(($result_info->yes_ans / ($result_info->yes_ans + $result_info->no_ans)) * 100, 2) }}%
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content-header -->

        <!-- Modal -->



    @endsection
