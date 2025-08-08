@extends('layouts.dasboardtemp')
@section('title', 'Exams')
@section('admincontent')
    <style type="text/css">
        .question_options>li {
            list-style: none;
            height: 40px;
            line-height: 40px;
        }



        .page-nums {
            padding: 10px;
            text-align: center;
            list-style: none;
        }

        .page-nums li {
            background-color: #b1b4b8;
            padding: 0.5rem 0.9rem;
            display: inline-block;
            margin: 0 10px;
            margin: 4px;
            cursor: pointer;
            color: white;
            border-radius: 0.5rem;
        }

        .page-nums .active {
            background: #1A69AF;
            color: #ffffff;
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
                        <h1 class="m-0">Exams</h1>
                    </div><!-- /.col -->
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
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h3 class="text-center">Time : {{ $subject->exam_duration }} min</h3>
                                        </div>
                                        <div class="col-sm-4">
                                            <h3><b>Timer</b> : <span class="js-timeout"
                                                    id="timer">{{ $subject['exam_duration'] }}:00</span></h3>
                                        </div>

                                        <div class="col-sm-4">
                                            <h3 class="text-right"><b>Status</b> :Running</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <div class="card mt-4">
                                <div class="card-body">
                                    <form action="{{ url('submit_questions') }}" method="POST" id="form">
                                        @csrf
                                        <input type="hidden" name="exam_id" value="{{ $subject->id }}">
                                        <input type="hidden" name="index" value="{{ count($questions) }}">

                                        <div class="row list">
                                            @foreach ($questions as $q)
                                                <div class="col-sm-12 mt-4 item">
                                                    <p>{{ $loop->iteration }}. {{ $q->question }}</p>
                                                    <?php
                                                    $options = json_decode(json_decode(json_encode($q->options)), true);
                                                    ?>
                                                    <input type="hidden" name="question_type{{ $loop->iteration }}"
                                                        value="{{ $q->question_type }}" />
                                                    <input type="hidden" name="question{{ $loop->iteration }}"
                                                        value="{{ $q['id'] }}" />
                                                    <input type="hidden" name="question_mark{{ $loop->iteration }}"
                                                        value="{{ $q['mark'] }}" />
                                                    @if ($q->question_type === 'multiple')
                                                        <ul class="question_options">
                                                            <li><input type="radio" value="{{ $options['option1'] }}"
                                                                    name="ans{{ $loop->iteration }}">
                                                                {{ $options['option1'] }}
                                                            </li>
                                                            <li><input type="radio" value="{{ $options['option2'] }}"
                                                                    name="ans{{ $loop->iteration }}">
                                                                {{ $options['option2'] }}
                                                            </li>
                                                            <li><input type="radio" value="{{ $options['option3'] }}"
                                                                    name="ans{{ $loop->iteration }}">
                                                                {{ $options['option3'] }}
                                                            </li>
                                                            <li><input type="radio" value="{{ $options['option4'] }}"
                                                                    name="ans{{ $loop->iteration }}">
                                                                {{ $options['option4'] }}
                                                            </li>

                                                            <li style="display: none;"><input value="0" type="radio"
                                                                    checked="checked" name="ans{{ $loop->iteration }}">
                                                                {{ $options['option4'] }}</li>
                                                        </ul>
                                                    @elseif ($q->question_type === 'alternate')
                                                        <ul class="question_options">
                                                            <li><input type="radio" value="{{ $options['option1'] }}"
                                                                    name="ans{{ $loop->iteration }}">
                                                                {{ $options['option1'] }}
                                                            </li>
                                                            <li><input type="radio" value="{{ $options['option2'] }}"
                                                                    name="ans{{ $loop->iteration }}">
                                                                {{ $options['option2'] }}
                                                            </li>
                                                            {{-- <li style="display: none;"><input value="0" type="radio"
                                                                    checked="checked" name="ans{{ $key + 1 }}">
                                                                {{ $options['option4'] }}</li> --}}
                                                        </ul>
                                                    @else
                                                        <textarea class="w-100 p-2 " style="border-radius: 10px " id="" rows="4" name="ans{{ $loop->iteration }}"
                                                            placeholder="Type in your Answer here"></textarea>
                                                    @endif
                                                </div>
                                            @endforeach


                                            <div class="row p-0">
                                                <?php if (isset($questions)) {?>
                                                <div class="col-12">
                                                    <ul class="page-nums"></ul>
                                                </div>
                                                <?php }?>
                                            </div>



                                            <div class="col-sm-12 mt-4">
                                                <button type="submit" class="btn btn-primary"
                                                    id="myCheck">Submit</button>
                                            </div>
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



        <script src="{{ url('js/table/jquery-3.3.1.min.js') }}"></script>

        <script>
            let currentPage = 1;
            let limit = 1;
            let list = document.querySelectorAll('.list .item');
            let listVal = document.querySelectorAll('.list .item .video-id-val');


            const form = document.querySelector("form#form");
            // let watchBtn = document.querySelectorAll('.list .item .btn-watch');
            let submitProofBtn = document.querySelector("#proofModal form #submitProof");

            // list.forEach (item => {
            // 	let id =item.getAttribute('id');
            // 	console.log(id);
            // })


            // console.log(list);
            function loadItem() {
                let startGet = limit * (currentPage - 1);
                let endGet = limit * currentPage - 1;
                list.forEach((item, key) => {
                    if (key >= startGet && key <= endGet) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
                listPage();
            }
            loadItem();


            function listPage() {
                let count = Math.ceil(list.length / limit);
                document.querySelector('.page-nums').innerHTML = '';

                if (currentPage != 1) {
                    let prev = document.createElement('li');
                    prev.innerText = 'PREV';
                    prev.setAttribute('onclick', "changePage(" + (currentPage - 1) + ")");
                    document.querySelector('.page-nums').appendChild(prev);
                }

                for (let i = 1; i <= count; i++) {
                    let newPage = document.createElement('li');
                    newPage.innerText = i;
                    if (i == currentPage) {
                        newPage.classList.add('active');
                    }
                    newPage.setAttribute('onclick', "changePage(" + i + ")");
                    document.querySelector('.page-nums').appendChild(newPage);
                }

                if (currentPage >= 1 && currentPage != count) {
                    let next = document.createElement('li');
                    next.innerText = 'NEXT';
                    next.setAttribute('onclick', "changePage(" + (currentPage + 1) + ")");
                    document.querySelector('.page-nums').appendChild(next);
                }
            }


            function changePage(i) {
                currentPage = i;
                loadItem();
            }

            // form.onsubmit = (e) => {
            //     e.preventDefault(); //preventing from from submitting
            // }





            // JQuery 
            var interval;

            function countdown() {
                clearInterval(interval);
                interval = setInterval(function() {
                    var timer = $('.js-timeout').html();
                    timer = timer.split(':');
                    var minutes = timer[0];
                    var seconds = timer[1];
                    seconds -= 1;
                    if (minutes < 0) return;
                    else if (seconds < 0 && minutes != 0) {
                        minutes -= 1;
                        seconds = 59;
                    } else if (seconds < 10 && length.seconds != 2) seconds = '0' + seconds;

                    $('.js-timeout').html(minutes + ':' + seconds);

                    if (minutes == 0 && seconds == 0) {
                        clearInterval(interval);
                        alert('time UP');
                        myFunction()
                    }
                }, 1000);
            }

            var time = document.getElementById('timer').value;
            $('.js-timeout').text(time);
            countdown();


            function myFunction() {
                document.getElementById("myCheck").click();
            }
        </script>


    @endsection
