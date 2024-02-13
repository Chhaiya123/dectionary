@extends('index')
@section('contant')
    <div class="container">
        <div class="d-flex justify-content-between gap-3 align-content-center">
                <div>
                    <form action=" {{ route('search') }} " method="GET" style="max-width: 700px;">
                        <div class="input-group w-100">
                            <input  type="text" name="query" class="form-control "  value="{{$query=$query}}" placeholder="Search word..." aria-label="Username" aria-describedby="basic-addon1">
                            <span class="input-group-text p-1 text-bg-primary" id="basic-addon1">
                                <button type="submit" class="btn btn-sm text-bg-primary"><svg class="icon icon-lg">
                                     <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-zoom"></use>
                                </svg></button>
                            </span>
                        </div>
                    </form>
                </div>
                <a class="btn btn-primary" href="{{route('create')}}">Create</a>
            
        </div>
        
        <div class="table-scroll">
            <div class="table-responsive">
                <table class="table table-bordered mt-2">
                    <thead>
                        
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Words</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($results as $dt)
                        <tr>
                            <th width="50px" scope="row">{{$dt->word_id}}</th>
                            <td>{{$dt->word}}</td>
                            <td>{{$dt->description}}</td>
                            <td>
                                <div  class="d-flex gap-1 justify-content-end">
                                    <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#exampleModal{{$dt->word_id}}">Edit</button>
                                    {{-- <a href="{{ url('edit/'.$dt->word_id) }}" class="btn btn-primary">Edit</button> --}}
                                    <a href="{{url('delete/'.$dt->word_id)}}" class="btn btn-danger text-light">Delete</a>
                                </div>
                            </td>
                        </tr>
                        {{-- Edit form --}}
                        <div class="modal fade" id="exampleModal{{$dt->word_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">  
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
                                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-5">
                                        <form class="row needs-validation" action="{{url('wordupdate/'.$dt->word_id)}}" method="post" novalidate>
                                            @csrf
                                            @method('put')
                                            <div class="row g-3" >
                                                <div class="col-md-12">
                                                    <label for="word" class="form-label">WORD</label>
                                                    <input type="text" class="form-control" id="word" name="word" value="{{$dt->word}}" placeholder="Input word" required>
                                                    
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="des" class="form-label text-uppercase">Description</label>
                                                    <textarea class="form-control" name="description" id="des" placeholder="Input description" required style="width: 100%; height: 200px;">{{$dt->description}}</textarea>
                                                    
                                                </div>
                                                
                                                <div class="col-12">
                                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                                    <button class="btn text-light btn-danger" type="button">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    
                                    </div>
                    
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="4"><h4 class="text-center">There are no word.</h4></td>
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
            {{-- <div class="col">
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
            </div> --}}
        </div>
    </div>

@endsection