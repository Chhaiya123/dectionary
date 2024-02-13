@extends('index')
@section('contant')
    <div class="container">
        <div class="d-flex justify-content-between gap-3 align-content-center">
            <div>
                <form action=" {{ url('users') }} " method="GET" style="max-width: 700px;">
                    <div class="input-group w-100">
                        <input  type="text" name="query_user" class="form-control "  value="{{$query=$query}}" placeholder="Search word..." aria-label="Username" aria-describedby="basic-addon1">
                        <span class="input-group-text p-1 text-bg-primary" id="basic-addon1">
                            <button type="submit" class="btn btn-sm text-bg-primary"><svg class="icon icon-lg">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-zoom"></use>
                            </svg></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-scroll">
            <div class="table-responsive">
                <table class="table table-bordered mt-2">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th class="name" scope="col">NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">Profile</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($results as $dt)
                        <tr>
                            <th scope="row">{{$dt->id}}</th>
                            <td class="name text-nowrap">{{$dt->name}}</td>
                            <td>{{$dt->email}}</td>
                            <td style="width: 120px">
                                <img class="my-profile" src="{{$dt->image ? '../../uploads/'.$dt->image : '../../assets/img/logo.jpg'}}" alt="">
                            </td>
                            <td class="text-center">
                                <a href="" class="btn btn-danger text-light ">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4"><h4 class="text-center">There are no User.</h4></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{-- @foreach($counts as $dataa) --}}
                    <p>Showing {{$counts}} results.</p>
                {{-- @endforeach --}}
                
            </div>
        </div>
    </div>

@endsection