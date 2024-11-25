@extends('layouts.dasboardtemp')

@section('admincontent')
    <div class = "row mt-3 ms-3">
        @foreach ($fetchSubjects as $subject)
            <div class = "col-12 col-md-4">
                <img src="{{ asset('storage/'.$subject->avatar) }}" class = "img-fluid mb-2" style="height:15rem"/>
                <span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-start jss">{{$subject->title}}</span>
                <p class = "p text-md-start">{{$subject->description}}
                </p>
                <div class="d-flex justify-content-start mb-3">
                    <a class="btn btn-outline-primary mb-3 sub" href = "{{ route('learning', ['data' => $subject])  }}">VIEW NOTE</a>
                </div>
            </div>
        @endforeach

    </div>


@endsection
