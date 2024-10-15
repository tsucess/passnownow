@extends('layouts.dasboardtemp')

@section('admincontent')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-md btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#addModal">Add User</button>
            </div>
        </div>
    </div>
    {{$sn= 0;}}
        <div class="table-responsive mb-5 pb-5">
            <table id="admin-table" class="table custom-table mb-5 pb-5">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fetchUsers as $User)
                        <tr>
                            <th>{{ ++$sn }}</th>
                            <td> {{ $User->first_name }} {{ $User->last_name }}</td>
                            <td>{{ $User->username }}</td>
                            <td>{{ $User->email }}</td>
                            <td>
                                @if ($User->role === 'sadmin')
                                {{ 'Super Admin'}}
                                @elseif ($User->role === 'admin')
                                {{'Admin'}}
                                @else
                                {{ 'User'}}
                                @endif
                              </td>
                            <td>{{ $User['created_at'] }}</td>
                            <td> 
                                <a href="{{ route('admin.edit', ['data' => $User])}}" class="btn btn-primary p-1 px-3">view</a>
                                <a href="{{ route('admin.destroy', ['data' => $User->id])}}" class="btn btn-danger p-1 px-3">Delete</a>
                                
                            </td>
    
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>






     <!-- Add User Modal -->
     <div class="modal fade" id="addModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="addModalLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content" id="form_add">
           
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="addModalLabel">Add Admin</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form method="POST" action="{{ route('admin.store') }}">
                 @csrf
                 <div class="modal-body">
                     <x-text-input type="hidden"  class="form-control" name="unique_id" value="{{ rand(time(), 10000000);}}" />
                     <x-text-input type="hidden"  class="form-control" name="terms" value="on" />
                     <div class="row">
                         <div class="col-6">
                             <div class="mb-3">
                                 <x-input-label :value="__('First Name')" />
                                 <x-text-input type="text" class="form-control" name="fname" :value="old('fname')" aria-describedby="textBlock" placeholder="First Name" required />
                                 <x-input-error :messages="$errors->get('fname')" class="mt-2 text-danger" />
                             </div>
                         </div>
                         <div class="col-6">
                             <div class="mb-3">
                                 <x-input-label :value="__('Last Name')" />
                                 <x-text-input type="text" class="form-control" name="lname" :value="old('lname')" aria-describedby="textBlock" placeholder="Last Name" required />
                                 <x-input-error :messages="$errors->get('lname')" class="mt-2 text-danger" />
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-6">
                             <div class="mb-3">
                             <x-input-label :value="__('User Name')" />
                             <x-text-input type="text"  class="form-control" name="username" :value="old('username')" aria-describedby="textBlock" placeholder="User Name" required />
                             <x-input-error :messages="$errors->get('username')" class="mt-2 text-danger" />
                             </div>
                         </div>
                         <div class="col-6">
                             <div class="mb-3">
                                 <x-input-label for="email" :value="__('Email Address')" />
                             <x-text-input  class="form-control" type="email" name="email" :value="old('email')" aria-describedby="emailBlock" placeholder="example@email.com" required />
                             <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <div class="mb-3">
                                
                             <x-text-input  class="form-control" type="text" name="role" :value="old('role')"  value="user" required readonly />
                                 {{-- <x-input-label class="form-label" :value="__('User Role')" /> --}}
                                 {{-- <select name="role" class="form-control py-2">
                                     <option value ="undefined">Select Role</option>
                                     <option value="sadmin">Super Admin</option>
                                     <option value="admin">Admin</option>
                                     <option value="user">User</option>
                                 </select> --}}
                             </div>
                         </div>
                     </div>
                     <div class="mb-3">
                         <x-input-label :value="__('Password')" />
                             <x-text-input type="password"  class="form-control" :value="old('password')" name="password" aria-describedby="passwordBlock" placeholder="password"  required/>
                             <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                     </div>
                     <div class="mb-3">
                         <x-input-label :value="__('Confirm Password')" />
                         <x-text-input type="password" class="form-control" :value="old('password_confirmation ')" name="password_confirmation" aria-describedby="passwordBlock" placeholder="Repeat Password" />
                         <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                     </div>
                 </div>
                 <div class="modal-footer">
                     <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                     <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                 </div>
             </form>
         </div>
     </div>
 </div>


    <script src="{{ 'assets/js/table/jquery-3.3.1.min.js' }}"></script>
    <script src="{{ 'assets/js/table/jquery.dataTables.min.js' }}"></script>
    <script src="{{ 'assets/js/table/dataTables.bootstrap.min.js' }}"></script>



    <script>
        let table = new DataTable('#admin-table');
    </script>
@endsection
