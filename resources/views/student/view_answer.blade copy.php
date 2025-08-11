@extends('layouts.dasboardtemp')
@section('title', 'Exams')
@section('admincontent')
    <style type="text/css">
        .question_options>li {
            list-style: none;
            height: 40px;
            line-height: 40px;
        }
    </style>
    <!-- /.content-header -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Answers</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2" id="topButton">
                                <a href="{{ URL::previous() }}" class="btn btn-secondary p-1 px-5 shadow">Back</a>
                            </div>
                        </div>
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
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <div class="card mt-4">
                                <div class="card-body">
                                    <form action="#" class="container">
                                        <div class="row container">
                                            @foreach ($questions as $key => $q)
                                                <div class="col-sm-12 mt-4">
                                                    <p>{{ $key + 1 }}. {{ $q['question'] }}</p>
                                                    @if ($q['question_type'] === 'multiple')
                                                        <?php
                                                        $options = json_decode(json_decode(json_encode($q['options'])), true);
                                                        ?>
                                                        <input type="hidden" name="question{{ $key + 1 }}"
                                                            value="{{ $q['id'] }}">
                                                        <ul class="question_options">
                                                            <li><input type="radio" <?php if ($options['option1'] == $q['ans']) {
                                                                echo 'checked';
                                                            } else {
                                                                echo 'disabled';
                                                            } ?>>
                                                                {{ $options['option1'] }}</li>
                                                            <li><input type="radio" <?php if ($options['option2'] == $q['ans']) {
                                                                echo 'checked';
                                                            } else {
                                                                echo 'disabled';
                                                            } ?>>
                                                                {{ $options['option2'] }}</li>
                                                            <li><input type="radio" <?php if ($options['option3'] == $q['ans']) {
                                                                echo 'checked';
                                                            } else {
                                                                echo 'disabled';
                                                            } ?>>
                                                                {{ $options['option3'] }}</li>
                                                            <li><input type="radio" <?php if ($options['option4'] == $q['ans']) {
                                                                echo 'checked';
                                                            } else {
                                                                echo 'disabled';
                                                            } ?>>
                                                                {{ $options['option4'] }}</li>
                                                        </ul>
                                                    @elseif ($q['question_type'] === 'alternate')
                                                        <?php
                                                        $options = json_decode(json_decode(json_encode($q['options'])), true);
                                                        ?>
                                                        <input type="hidden" name="question{{ $key + 1 }}"
                                                            value="{{ $q['id'] }}">
                                                        <ul class="question_options">
                                                            <li><input type="radio" <?php if ($options['option1'] == $q['ans']) {
                                                                echo 'checked';
                                                            } else {
                                                                echo 'disabled';
                                                            } ?>>
                                                                {{ $options['option1'] }}</li>
                                                            <li><input type="radio" <?php if ($options['option2'] == $q['ans']) {
                                                                echo 'checked';
                                                            } else {
                                                                echo 'disabled';
                                                            } ?>>
                                                                {{ $options['option2'] }}</li>
                                                        </ul>
                                                    @else
                                                        <b> Ans:</b>
                                                        {!! $q['ans'] !!}
                                                    @endif
                                                </div>
                                            @endforeach

                                        </div>
                                    </form>
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

    </div>

@endsection
