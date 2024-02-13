@extends('index')
@section('contant')
    <div class="container">
        <div class="d-flex justify-content-between gap-3 align-content-center">
            <div>
                <form action="{{route('search.profile')}}" method="GET" style="max-width: 700px;">
                    <div class="input-group w-100">
                        <input  type="text" name="query_user" class="form-control " placeholder="Search user..." aria-label="Username" aria-describedby="basic-addon1">
                        <span class="input-group-text p-1 text-bg-primary" id="basic-addon1">
                            <button type="submit" class="btn btn-sm text-bg-primary"><svg class="icon icon-lg">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-zoom"></use>
                            </svg></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="my-table">
            <table class="table table-bordered mt-2">
                <thead> 
                    {{-- @if(Session::has('success'))
                    <tr>
                        <th colspan="4">
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        </th>
                    </tr>
                    @endif --}}
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @if($results as $dt) --}}
                    @forelse($data as $dt)
                        {{-- @if(Auth::user() == Auth::user())
                            <tr>
                                <th scope="row">{{$dt->id}}</th>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->email}}</td>
                                <td style="width: 120px"><img class="my-profile" src="{{$dt->image ? '../../uploads/'.$dt->image : '../../assets/img/logo.jpg'}}" alt=""></td>
                                <td class="te text-end" style="width: 100px">
                                    <a href="" class="btn btn-danger text-light">Delete</a>
                                </td>
                            </tr>
                        @endif --}}
                        {{-- @if(Auth::check() == Auth::user()) --}}
                            <tr>
                                <th scope="row">{{$dt->id}}</th>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->email}}</td>
                                <td style="width: 120px">
                                    <img class="my-profile" src="{{$dt->image ? '../../uploads/'.$dt->image : '../../assets/img/logo.jpg'}}" alt="">
                                </td>
                                <td class="text-center">
                                    <a href="" class="btn btn-danger text-light ">Delete</a>
                                </td>
                            </tr>
                        {{-- @endif --}}
                    @empty
                    <tr>
                        <td colspan="4">There are no User.</td>
                    </tr>
                    @endforelse
                </tbody>
                
            </table>
        </div>
        <div class="row">
            <div class="col">
                <p>Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} results.</p>
            </div>
            <div class="col">
                <nav class="d-flex justify-content-end">
                    <ul class="pagination">
                        @if ($data->currentPage() >= 1)
                        <li class="page-item {{$data->currentPage() <= 1 ? 'disabled' :''}}">
                            <a class="page-link" href="{{ $data->previousPageUrl() }}">Previous</a>
                        </li>
                        @endif
            
                        @for ($i = 1; $i <= $data->lastPage(); $i++)
                            <li class="page-item {{ ($data->currentPage() == $i) ? 'active' : '' }}">
                                <a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
            
                        @if ($data->currentPage() <= $data->lastPage())
                            <li class="page-item {{$data->currentPage() < $data->lastPage() ? '' : 'disabled'}}">
                                <a class="page-link d-block" href="{{ $data->nextPageUrl() }}">Next</a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
     
@endsection