@extends('layouts.dasboardtemp')
@section('title', 'Exams')
@section('admincontent')
<style type="text/css">
    .question_options>li {
        list-style: none;
        height: 40px;
        line-height: 40px;
    }
    .correct-answer {
        background: #d4edda;
        border-left: 5px solid #28a745;
        padding: 5px;
        border-radius: 4px;
    }
    .wrong-answer {
        background: #f8d7da;
        border-left: 5px solid #dc3545;
        padding: 5px;
        border-radius: 4px;
    }
</style>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Answers</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2" id="topButton">
                        <a href="{{ URL::previous() }}" class="btn btn-secondary p-1 px-5 shadow">Back</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if(!empty($questions))
                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="row container">
                                    @foreach ($questions as $key => $q)
                                        @php
                                            $answerData = $answersMap->get($q['id']);
                                            $userAnswer = $answerData['answer'] ?? null;
                                            $isCorrect = $answerData && $answerData['status'] === 'YES';
                                        @endphp

                                        <div class="col-sm-12 mt-4">
                                            <p><b>{{ $key + 1 }}.</b> {{ $q['question'] }}</p>

                                            {{-- Multiple Choice --}}
                                            @if (in_array($q['question_type'], ['multiple', 'alternate']))
                                                @php
                                                    $options = json_decode(json_decode(json_encode($q['options'])), true);
                                                @endphp
                                                <ul class="question_options">
                                                    @foreach ($options as $option)
                                                        <li class="
                                                            @if($option == $q['ans']) correct-answer
                                                            @elseif($option == $userAnswer && $option != $q['ans']) wrong-answer
                                                            @endif
                                                        ">
                                                            <input type="radio" disabled {{ $option == $userAnswer ? 'checked' : '' }}>
                                                            {{ $option }}
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            {{-- Theory Question --}}
                                            @else
                                                <p><b>Correct Answer:</b> {!! $q['ans'] !!}</p>
                                                <p class="{{ $isCorrect ? 'correct-answer' : 'wrong-answer' }}">
                                                    <b>Your Answer:</b> {!! $userAnswer ?? 'No answer given' !!}
                                                </p>
                                                @if(!empty($answerData['ai_feedback']))
                                                    <p><i>AI Feedback:</i> {{ $answerData['ai_feedback'] }}</p>
                                                @endif
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @else
                            <p class="text-center">No answers found for this exam.</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
