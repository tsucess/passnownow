@extends('layouts.dasboardtemp')

<style>
/* Fade-in animation for the cards */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}





/* Adding subtle animation to the text span */
.jss {
    animation: fadeIn 1s ease-in-out;
}

/* Responsive padding for paragraphs */
.p {
    transition: color 0.3s;
}

.p:hover {
    color: #0056b3;
}





/* Define the animation */
@keyframes slideInFromRight {
  0% {
    transform: translateX(100%); /* Start outside the viewport on the right */
    opacity: 0; /* Invisible at the start */
  }
  100% {
    transform: translateX(0); /* End at the original position */
    opacity: 1; /* Fully visible */
  }
}

</style>

@section('admincontent')


    @if (Auth::user()->role === 'user')
        <div class = "row mt-3 ml-5 bg-danger">
            @foreach ($fetchClasses as $Class)
                <div class = "col-12 col-md-4 sty">
                    <img src= "{{ asset('storage/'.$Class->avatar) }}" class = "img-fluid mb-2" style="height:15rem; width: 100%" alt="Avatar" />
                    <span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-center jss">{{$Class->title}} Class Note</span>
                    <p class = "p text-md-center ms-4 me-4">{{$Class->description}}
                    </p>
                    <div class="d-flex justify-content-center mb-3">
                        <a class="btn btn-outline-primary mb-3 sub" href = "{{ route('subject', ['data' => $Class]) }}">VIEW ALL SUBJECTS</a>
                    </div>
                </div>
            @endforeach

        </div>
    @else
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Services</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                {{-- <div class="btn-group me-2">
                    <button type="button" class="btn btn-md btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#addModal">Add New Service User</button>
                </div> --}}
            </div>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif(\Session::has('error'))
            <div class="alert alert-danger">
                <p class="m-0">{{ \Session::get('error') }}</p>
            </div>
        @endif
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p class="m-0">{{ \Session::get('success') }}</p>
            </div>
        @endif
        {{-- <php if (isset($output)) {?> --}}
        <div class="table-responsive mb-5 p-4 pb-5">
            <table id="admin-table" class="table custom-table mb-5 pb-5">
                <thead class="table-secondary">
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="col-3">Services</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Status</th>

                    </tr>
                </thead>
                <tbody>
                    @php $sn = 0  @endphp
                    @foreach ($fetchClasses as $Class)
                        <tr>
                            <th>{{ ++$sn }}</th>
                            <td>{{ $Class->first_name }}</td>
                            <td>{{ $Class->last_name }}</td>
                            <td>{{ $Class->email}}</td>
                            <td>{{ $Class->plan_name}}</td>
                            <td>
                                {{ $Class->amount}}
                            </td>
                            <td>{{ $Class->phone}}</td>
                            <td>
                                {{ $Class->active_status}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>





    @endif


    <script src="{{ 'js/table/jquery-3.3.1.min.js' }}"></script>
    <script src="{{ 'js/jquery.min.js' }}"></script>
    <script src="{{ 'js/table/jquery.dataTables.min.js' }}"></script>
    <script src="{{ 'js/table/dataTables.bootstrap.min.js' }}"></script>




    <script>
        let table = new DataTable('#admin-table');
    </script>



    <script>
        $(document).ready(function() {

            $('#admin-table tbody').on('click', '.user-edit-btn', function() {
                var id = $(this).data('id');
                var title = $(this).data('title');
                var description = $(this).data('description');
                var editavatar = $(this).data('avatar');

                // console.log(id);
                // console.log(title);
                // console.log(description);
                // console.log("===================");

                $('#edit-id').val(id);
                $('#edit-title').val(title);
                $('#edit-description').val(description);
                $('#prev-avatar').val(editavatar);
            });

        });
    </script>

@endsection
