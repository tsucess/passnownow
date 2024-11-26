@extends('layouts.dasboardtemp')

<style>
/* Keyframes for fade-in and slide-in from the bottom */
@keyframes fadeInSlideUp {
    0% {
        transform: translateY(30px); /* Start slightly below */
        opacity: 0; /* Start invisible */
    }
    100% {
        transform: translateY(0); /* End at the original position */
        opacity: 1; /* Fully visible */
    }
}

/* Apply animation to the cards */
.animated-card {
    opacity: 0; /* Start invisible */
    animation: fadeInSlideUp 0.8s ease-out forwards; /* Forward to keep the final state */
}

/* Staggered animation using nth-child */
.animated-card:nth-child(1) {
    animation-delay: 0s;
}
.animated-card:nth-child(2) {
    animation-delay: 0.2s;
}
.animated-card:nth-child(3) {
    animation-delay: 0.4s;
}
.animated-card:nth-child(4) {
    animation-delay: 0.6s;
}

</style>

@section('admincontent')
    <div class = "row mt-3 ms-3">
        @foreach ($fetchSubjects as $subject)
            <div class = "col-12 col-md-4 animated-card">
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
