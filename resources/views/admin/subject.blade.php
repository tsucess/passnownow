@extends('layouts.dasboardtemp')

<style>
    /* Keyframes for fade-in and slide-in from the bottom */
    @keyframes fadeInSlideUp {
        0% {
            transform: translateY(30px);
            /* Start slightly below */
            opacity: 0;
            /* Start invisible */
        }

        100% {
            transform: translateY(0);
            /* End at the original position */
            opacity: 1;
            /* Fully visible */
        }
    }

    /* Apply animation to the cards */
    .animated-card {
        opacity: 0;
        /* Start invisible */
        animation: fadeInSlideUp 0.8s ease-out forwards;
        /* Forward to keep the final state */
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
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Subjects</h1>

        <div class="position-relative">
            <i class="fa-solid fa-magnifying-glass position-absolute top-50 start-0 translate-middle ms-3 text-muted"></i>
            <input type="text" class="form-control ps-5" id="subjectFilterInput" placeholder="Search by Year">
          </div>

          <script>
            document.getElementById('subjectFilterInput').addEventListener('input', function () {
                const filterValue = this.value.trim().toLowerCase();
                const cards = document.querySelectorAll('.animated-card');

                cards.forEach(card => {
                    const year = card.getAttribute('subject-class').toLowerCase();
                    if (filterValue === '' || year.includes(filterValue)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        </script>



        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2" id="topButton">
                <a href="/classes" class="btn btn-secondary p-1 px-5 shadow">Back</a>
            </div>
        </div>
    </div>
    <div class = "row mt-3 ms-3">
        @if (!empty($fetchSubjects[0]))
            @foreach ($fetchSubjects as $subject)
                <div class = "col-12 col-md-4 animated-card mb-5" subject-class="{{ $subject->title }}">
                    <img src="{{ asset('storage/' . $subject->avatar) }}" class = "img-fluid mb-2" style="height:15rem" />
                    <span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-start jss">{{ $subject->title }}</span>
                    <p class = "p text-md-start">{{ $subject->description }}
                    </p>
                    <div class="d-flex justify-content-start mb-3">
                        @if (Auth::user()->status === 1)
                            <a class="btn btn-outline-primary mb-3 sub"
                                href = "{{ route('learning', ['data' => $subject]) }}">VIEW NOTE</a>
                        @else
                            <button type="button" class="btn btn-outline-primary sub" data-bs-toggle="modal"
                                data-bs-target="#subscribeModal">Subscribe Now</button>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class = "col-12 animated-card text-center">
                <p>No Subjects uploaded yet, come back later</p>
            </div>
        @endif


        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
    </div>

    <!-- Subscribe Modal -->
    <div class="modal fade" id="subscribeModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3 mx-auto text-center">
                                <a href="/"><img src="{{ asset('images/logo.png') }}" alt=""
                                        class="mb-3 w-50"></a>
                                <h5>You do not have an active subscription</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="/checkoutdetails" class="btn upgrade-btn mx-auto">Subscribe Now</a>
                </div>
            </div>
        </div>
    </div>
@endsection
