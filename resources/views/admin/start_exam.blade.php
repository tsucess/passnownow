@extends('layouts.dasboardtemp')
@section('title', 'Exams')
@section('admincontent')
    <style type="text/css">
        .text-color {
            color: #1A69AF;
        }

        .list {
            position: relative;
        }

        .list .item {
            height: 22rem;
            padding: 1.5rem;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.4s ease, transform 0.4s ease;
            display: none;
            /* Default hidden */

        }

        .list .item.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .question_options>li {
            list-style: none;
            height: 40px;
            line-height: 40px;
        }

        ul.page-nums {
            padding: 10px 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            /* Stack controls and numbers vertically */
            align-items: center;
            width: 100%;
        }

        .page-controls {
            display: flex;
            justify-content: flex-end;
            width: 100%;
            /* Adjust spacing between prev and next */
            margin-bottom: 20px;
        }



        .page-nums li {

            padding: 0.5rem 0.9rem;
            display: inline-block;
            margin: 4px;
            cursor: pointer;
            color: rgb(46, 46, 46);
            border: 1px solid #a1a1a1;
            border-radius: 0.5rem;
        }

        .page-nums .active {
            background: #1A69AF;
            color: #ffffff;
        }

        .page-number-row {
            display: flex;
            gap: 5px;
            width: 100%;
            flex-wrap: wrap;
            background: #ffffff;
            padding: 1rem;
            border: 1px solid #a1a1a1;
            border-radius: 10px
        }

        .page-controls li:hover {
            background: #135fa1;
        }

        .page-controls li {
            background: #1A69AF;
            width: 5rem;
            padding: 0.5rem 0.3rem;
            text-align: center;
            color: #ffffff
        }

        /* .page-nums {
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
                } */



        .submitCancel{
            color: #1A69AF;
            border: 1px solid #1A69AF;
            padding: 0.8rem 0.3rem;
            /* border-radius: 0.5rem; */
            width: 8rem;
        }
        
        
        .submitConfirm {
            background: #1A69AF;
            color: #ffffff;
            width: 10rem;
            padding: 0.8rem 0.3rem;
            /* border-radius: 0.5rem; */
        }

        #myCheck {
            background: #1A69AF;
            width: 5rem;
            padding: 0.5rem 0.3rem;
            border-radius: 0.5rem;
            position: absolute;
            top: 390px;
        }

        .submitConfirm:hover,
        #myCheck:hover {
            background: #135fa1;
        }


        @media (min-width: 768px) {
            .list .item {
                height: 18rem;
            }

            .page-controls li {
                width: 8rem;
                padding: 1rem 0.5rem;
            }

            #myCheck {
                top: 325px;
                width: 8rem;
                padding: 1rem 0.5rem;
            }
        }

        @media (min-width: 1024px) {
            .page-controls li {
                width: 10rem;
                padding: 1rem 0.5rem;
            }

            #myCheck {
                width: 10rem;
                padding: 1rem 0.5rem;
            }
        }

        /* Highlight answered questions */
        .page-number-row li.answered {
            background-color: #D0D0D2 !important;
            /* background-color: #b1b4b8; !important; */
            /* color: #fff !important; */
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
                <div class="container-fluid p-2 p-md-4">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">

                                <div class="card-body pb-0">
                                    <div class="row p-2">
                                        <div class="col-4">
                                            <h3 class="fs-5 fs-md-4"><b>Time</b>: {{ $subject->exam_duration }}min</h3>
                                        </div>
                                        <div class="col-4">
                                            <h3 class="fs-5 fs-md-4"><b>Timer</b>: <span class="js-timeout"
                                                    id="timer">{{ $subject['exam_duration'] }}:00</span></h3>
                                        </div>

                                        <div class="col-4 p-0">
                                            <h3 class="fs-5 fs-md-4"><b>Status</b>: Running</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <div class=" mt-4">
                                <div class="card-body pt-0">
                                    <form action="{{ url('submit_questions') }}" method="POST" id="form">
                                        @csrf
                                        <input type="hidden" name="exam_id" value="{{ $subject->id }}">
                                        <input type="hidden" name="index" value="{{ count($questions) }}">

                                        <div class="row list">
                                            @foreach ($questions as $q)
                                                <div class="col-sm-12 mt-4 item bg-white">
                                                    <h5 class="mb-3 text-color"> Question {{ $loop->iteration }}.</h5>
                                                    <p class="fs-5">{{ $q->question }}</p>
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
                                                        <ul class="ms-md-3 question_options">
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
                                                        <ul class="ms-md-3 question_options pb-3">
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
                                                        <textarea class="ms-md-3 p-2 " style="width: 97%; border-radius: 10px " id="" rows="4"
                                                            name="ans{{ $loop->iteration }}" placeholder="Type in your Answer here"></textarea>
                                                    @endif
                                                </div>
                                            @endforeach

                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary"
                                                    id="myCheck">Submit</button>
                                            </div>

                                            <div class="row ms-2 p-0">
                                                <?php if (isset($questions)) {?>
                                                <div class="col-12 p-0">
                                                    <ul class="page-nums"></ul>
                                                </div>
                                                <?php }?>
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
        <!-- Confirmation Modal -->
        <div class="modal fade" id="confirmSubmitModal" tabindex="-1" aria-labelledby="confirmSubmitModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-2">
                    <div class="modal-body text-center">
                        <h4 class="text-color">This process is irreversible</h4>
                        <p>Are you sure you want to submit?</p>
                    </div>
                    <div class="modal-footer mx-auto border-0">
                        <button type="button" class="btn submitCancel" data-bs-dismiss="modal">Go back</button>
                        <button type="button" id="confirmSubmitBtn" class="btn submitConfirm">Yes, I want to
                            submit</button>
                    </div>
                </div>
            </div>
        </div>



        <script src="{{ url('js/table/jquery-3.3.1.min.js') }}"></script>
        <script>
            let currentPage = 1;
            let limit = 1;
            const list = document.querySelectorAll('.list .item');
            const pageNumsContainer = document.querySelector('.page-nums');
            const submitButton = document.getElementById("myCheck");
            let answeredQuestions = new Set();

            submitButton.style.display = "none";

            function loadItem() {
                let startGet = limit * (currentPage - 1);
                let endGet = limit * currentPage - 1;
                if (endGet >= list.length) endGet = list.length - 1;

                list.forEach((item, key) => {
                    if (key >= startGet && key <= endGet) {
                        item.style.display = 'block';
                        setTimeout(() => item.classList.add('show'), 100);
                    } else {
                        item.classList.remove('show');
                        setTimeout(() => item.style.display = 'none', 1);
                    }
                });

                listPage();
            }

            function listPage() {
                let count = Math.ceil(list.length / limit);
                const container = document.querySelector('.page-nums');
                container.innerHTML = '';

                // Top row with Prev & Next
                let controls = document.createElement('div');
                controls.classList.add('page-controls');

                let prev = document.createElement('li');
                prev.innerText = 'PREV';
                if (currentPage > 1) {
                    prev.addEventListener('click', () => changePage(currentPage - 1));
                } else {
                    prev.style.opacity = 0.5;
                    prev.style.pointerEvents = 'none';
                }

                let next = document.createElement('li');
                next.innerText = 'NEXT';
                if (currentPage < count) {
                    next.addEventListener('click', () => changePage(currentPage + 1));
                } else {
                    next.style.opacity = 0.5;
                    next.style.pointerEvents = 'none';
                }

                controls.appendChild(prev);
                controls.appendChild(next);
                container.appendChild(controls);

                // Bottom row with page numbers
                let numbersRow = document.createElement('div');
                numbersRow.classList.add('page-number-row');

                for (let i = 1; i <= count; i++) {
                    let newPage = document.createElement('li');
                    newPage.innerText = i;
                    if (i === currentPage) newPage.classList.add('active');
                    if (answeredQuestions.has(i)) newPage.classList.add('answered');
                    newPage.addEventListener('click', () => changePage(i));
                    numbersRow.appendChild(newPage);
                }

                container.appendChild(numbersRow);

                // Show submit button on last page
                submitButton.style.display = (currentPage === count) ? "block" : "none";
            }

            function changePage(i) {
                currentPage = i;
                loadItem();
            }

            // Listen for answer changes
            document.querySelectorAll('input[type=radio], textarea').forEach(input => {
                input.addEventListener('input', function() {
                    let qNum = parseInt(this.name.match(/\d+/)[0]);

                    if (this.type === 'radio') {
                        if (this.checked) {
                            answeredQuestions.add(qNum);
                        }
                    } else if (this.tagName === 'TEXTAREA') {
                        if (this.value.trim() !== '') {
                            answeredQuestions.add(qNum);
                        } else {
                            answeredQuestions.delete(qNum);
                        }
                    }

                    listPage();
                });
            });

            // Initial load
            loadItem();

            // TIMER LOGIC
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
                    } else if (seconds < 10 && seconds.toString().length !== 2) seconds = '0' + seconds;

                    $('.js-timeout').html(minutes + ':' + seconds);

                    if (minutes == 0 && seconds == 0) {
                        clearInterval(interval);
                        alert('time UP');
                        myFunction();
                    }
                }, 1000);
            }

            var time = document.getElementById('timer').textContent;
            $('.js-timeout').text(time);
            countdown();

            function myFunction() {
                document.getElementById("myCheck").click();
            }


            // Show modal instead of submitting immediately
            submitButton.addEventListener('click', function(e) {
                e.preventDefault(); // Stop form submission
                $('#confirmSubmitModal').modal('show');
            });

            // Handle modal confirmation
            document.getElementById('confirmSubmitBtn').addEventListener('click', function() {
                document.getElementById('form').submit();
            });
        </script>



        {{-- <script>
            let currentPage = 1;
            let limit = 1;
            const list = document.querySelectorAll('.list .item');
            const pageNumsContainer = document.querySelector('.page-nums');
            const submitButton = document.getElementById("myCheck");

            submitButton.style.display = "none";

            function loadItem() {
                let startGet = limit * (currentPage - 1);
                let endGet = limit * currentPage - 1;
                if (endGet >= list.length) endGet = list.length - 1;

                list.forEach((item, key) => {
                    if (key >= startGet && key <= endGet) {
                        // Fade in
                        item.style.display = 'block';
                        setTimeout(() => item.classList.add('show'), 100);
                    } else {
                        // Fade out
                        item.classList.remove('show');
                        setTimeout(() => item.style.display = 'none', 1);
                    }
                });

                listPage();
            }

            function listPage() {
                let count = Math.ceil(list.length / limit);
                const container = document.querySelector('.page-nums');
                container.innerHTML = '';

                // Top row with Prev & Next
                let controls = document.createElement('div');
                controls.classList.add('page-controls');

                let prev = document.createElement('li');
                prev.innerText = 'PREV';
                if (currentPage > 1) {
                    prev.addEventListener('click', () => changePage(currentPage - 1));
                } else {
                    prev.style.opacity = 0.5;
                    prev.style.pointerEvents = 'none';
                }

                let next = document.createElement('li');
                next.innerText = 'NEXT';
                if (currentPage < count) {
                    next.addEventListener('click', () => changePage(currentPage + 1));
                } else {
                    next.style.opacity = 0.5;
                    next.style.pointerEvents = 'none';
                }

                controls.appendChild(prev);
                controls.appendChild(next);
                container.appendChild(controls);

                // Bottom row with page numbers
                let numbersRow = document.createElement('div');
                numbersRow.classList.add('page-number-row');

                for (let i = 1; i <= count; i++) {
                    let newPage = document.createElement('li');
                    newPage.innerText = i;
                    if (i === currentPage) newPage.classList.add('active');
                    newPage.addEventListener('click', () => changePage(i));
                    numbersRow.appendChild(newPage);
                }

                container.appendChild(numbersRow);

                // Show submit button on last page
                submitButton.style.display = (currentPage === count) ? "block" : "none";
            }


            function changePage(i) {
                currentPage = i;
                loadItem();
            }

            // Initial load
            loadItem();







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
                    } 
                    // else if (seconds < 10 && length.seconds != 2) seconds = '0' + seconds;
                    else if (seconds < 10 && seconds.toString().length !== 2) seconds = '0' + seconds;

                    $('.js-timeout').html(minutes + ':' + seconds);

                    if (minutes == 0 && seconds == 0) {
                        clearInterval(interval);
                        alert('time UP');
                        myFunction()
                    }
                }, 1000);
            }

            // var time = document.getElementById('timer').value;
            var time = document.getElementById('timer').textContent;

            $('.js-timeout').text(time);
            countdown();


            function myFunction() {
                document.getElementById("myCheck").click();
            }
        </script> --}}
        {{-- <script>
            let currentPage = 1;
            let limit = 1;
            const list = document.querySelectorAll('.list .item');
            const pageNumsContainer = document.querySelector('.page-nums');
            const submitButton = document.getElementById("myCheck");

            submitButton.style.display = "none";

            function loadItem() {
                let startGet = limit * (currentPage - 1);
                let endGet = limit * currentPage - 1;
                if (endGet >= list.length) endGet = list.length - 1;

                list.forEach((item, key) => {
                    if (key >= startGet && key <= endGet) {
                        // Fade in
                        item.style.display = 'block';
                        setTimeout(() => item.classList.add('show'), 100);
                    } else {
                        // Fade out
                        item.classList.remove('show');
                        setTimeout(() => item.style.display = 'none', 1);
                    }
                });

                listPage();
            }

            function listPage() {
                let count = Math.ceil(list.length / limit);
                pageNumsContainer.innerHTML = '';

                if (currentPage > 1) {
                    let prev = document.createElement('li');
                    prev.innerText = 'PREV';
                    prev.addEventListener('click', () => changePage(currentPage - 1));
                    pageNumsContainer.appendChild(prev);
                }

                for (let i = 1; i <= count; i++) {
                    let newPage = document.createElement('li');
                    newPage.innerText = i;
                    if (i === currentPage) newPage.classList.add('active');
                    newPage.addEventListener('click', () => changePage(i));
                    pageNumsContainer.appendChild(newPage);
                }

                if (currentPage < count) {
                    let next = document.createElement('li');
                    next.innerText = 'NEXT';
                    next.addEventListener('click', () => changePage(currentPage + 1));
                    pageNumsContainer.appendChild(next);
                }

                submitButton.style.display = (currentPage === count) ? "block" : "none";
            }

            function changePage(i) {
                currentPage = i;
                loadItem();
            }

            // Initial load
            loadItem();


            // let currentPage = 1;
            // let limit = 1;
            // let list = document.querySelectorAll('.list .item');
            // let listVal = document.querySelectorAll('.list .item .video-id-val');
            // let submitButton = document.getElementById("myCheck");
            // const form = document.querySelector("form#form");

            // submitButton.style.display = "none";
            // // console.log(list);
            // function loadItem() {
            //     let startGet = limit * (currentPage - 1);
            //     let endGet = limit * currentPage - 1;
            //     list.forEach((item, key) => {
            //         if (key >= startGet && key <= endGet) {
            //             item.style.display = 'block';
            //         } else {
            //             item.style.display = 'none';
            //         }
            //     });
            //     listPage();
            // }
            // loadItem();

            // function listPage() {
            //     let count = Math.ceil(list.length / limit);
            //     document.querySelector('.page-nums').innerHTML = '';

            //     if (currentPage != 1) {
            //         let prev = document.createElement('li');
            //         prev.innerText = 'PREV';
            //         prev.setAttribute('onclick', "changePage(" + (currentPage - 1) + ")");
            //         document.querySelector('.page-nums').appendChild(prev);
            //     }

            //     for (let i = 1; i <= count; i++) {
            //         let newPage = document.createElement('li');
            //         newPage.innerText = i;
            //         if (i == currentPage) {
            //             newPage.classList.add('active');
            //         }
            //         newPage.setAttribute('onclick', "changePage(" + i + ")");
            //         document.querySelector('.page-nums').appendChild(newPage);
            //     }

            //     if (currentPage >= 1 && currentPage != count) {
            //         let next = document.createElement('li');
            //         next.innerText = 'NEXT';
            //         next.setAttribute('onclick', "changePage(" + (currentPage + 1) + ")");
            //         document.querySelector('.page-nums').appendChild(next);
            //     }
            //     if (currentPage == count) {
            //         submitButton.style.display = "block";
            //     }
            // }

            // function changePage(i) {
            //     currentPage = i;
            //     loadItem();
            // }

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
        </script> --}}


    @endsection
