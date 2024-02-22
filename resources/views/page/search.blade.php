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
                <table class="table table-bordered mt-2" style="min-width: 600px;">
                    <thead>
                        
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Words <span class="text-primary">French</span></th>
                            <th scope="col">Description <span class="text-primary">French</span></th>
                            <th scope="col">Words <span class="text-danger">Khmer</span></th>
                            <th scope="col">Description <span class="text-danger">Khmer</span></th>
                            <th scope="col">Words <span class="text-success">English</span></th>
                            <th scope="col">Description <span class="text-success">English</span></th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($results as $dt)
                        <tr>
                            <th width="50px" scope="row">{{$dt->word_id}}</th>
                            <td class="text-nowrap">{{$dt->word}}</td>
                            <td class="description">{{$dt->description}}</td>
                            <td class="text-nowrap">{{$dt->word_km}}</td>
                            <td class="description">{{$dt->description_km}}</td>
                            <td class="text-nowrap">{{$dt->word_en}}</td>
                            <td class="description">{{$dt->description_en}}</td>
                            <td>
                                <div  class="d-flex gap-1 justify-content-end">
                                    <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#exampleModal{{$dt->word_id}}">Edit</button>
                                    {{-- <a href="{{ url('edit/'.$dt->word_id) }}" class="btn btn-primary">Edit</button> --}}
                                    <a href="{{url('delete/'.$dt->word_id)}}" class="btn btn-danger text-light">Delete</a>
                                </div>
                            </td>
                        </tr>
                        
                        @empty
                        <tr>
                            <td colspan="8"><h4 class="text-center">There are no word.</h4></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Edit form --}}
        @foreach($results as $dt)
        <div class="modal fade" id="exampleModal{{$dt->word_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">  
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-1 px-md-2 px-lg-5">
                        <form class="needs-validation" action="{{url('wordupdate/'.$dt->word_id)}}" method="post" novalidate>
                            @csrf
                            @method('put')
                            <div class="row g-3" >
                                {{-- input French --}}
                                <div class="col-md-12 col-lg-4">
                                    <label for="word" class="form-label">WORD <span class="text-light badge rounded-pill bg-primary">French</span></label>
                                    <input type="text" class="form-control" id="word" name="word" value="{{$dt->word}}" placeholder="Input word" required>
                                    @foreach($errors->get('word') as $error)
                                        <small class="text-danger">{{ $error }}</small>
                                    @endforeach
                                </div>
                                {{-- input Khmer --}}
                                <div class="col-md-12 col-lg-4">
                                    <label for="word_km" class="form-label">WORD <span class="text-light badge rounded-pill bg-danger">Khmer</span></label>
                                    <input type="text" class="form-control" id="word_km" name="word_km" value="{{$dt->word_km}}" placeholder="Input word khmer" required>
                                    @foreach($errors->get('word') as $error)
                                        <small class="text-danger">{{ $error }}</small>
                                    @endforeach
                                </div>
                                {{-- input Khmer --}}
                                <div class="col-md-12 col-lg-4">
                                    <label for="word_en" class="form-label">WORD <span class="text-light badge rounded-pill bg-success">English</span></label>
                                    <input type="text" class="form-control" id="word_en" name="word_en" value="{{$dt->word_en}}" placeholder="Input word english" required>
                                    @foreach($errors->get('word') as $error)
                                        <small class="text-danger">{{ $error }}</small>
                                    @endforeach
                                </div>
                                {{-- description french --}}
                                <div class="col-md-12">
                                    <label for="des" class="form-label text-uppercase">Description <span class="text-light badge rounded-pill bg-primary">French</span></label>
                                    <textarea class="form-control" name="description" id="des" placeholder="Input description" required style="width: 100%; height: 100px;">{{$dt->description}}</textarea>
                                    @foreach($errors->get('description') as $error)
                                        <small class="text-danger">{{ $error }}</small>
                                    @endforeach
                                </div>
                                {{-- description Khmer --}}
                                <div class="col-md-12">
                                    <label for="des_km" class="form-label text-uppercase">Description <span class="text-light badge rounded-pill bg-danger">Khmer</span></label>
                                    <textarea class="form-control" name="description_km" id="des_km" placeholder="Input description khmer" required style="width: 100%; height: 100px;">{{$dt->description_km}}</textarea>
                                    @foreach($errors->get('description') as $error)
                                        <small class="text-danger">{{ $error }}</small>
                                    @endforeach
                                </div>
                                {{-- description English --}}
                                <div class="col-md-12">
                                    <label for="des_en" class="form-label text-uppercase">Description <span class="text-light badge rounded-pill bg-success">English</span></label>
                                    <textarea class="form-control" name="description_en" id="des_en" placeholder="Input description english" required style="width: 100%; height: 100px;">{{$dt->description_en}}</textarea>
                                    @foreach($errors->get('description') as $error)
                                        <small class="text-danger">{{ $error }}</small>
                                    @endforeach
                                </div>
                                
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                    <button class="btn text-light btn-danger" type="button" data-coreui-dismiss="modal" aria-label="Close">Cancel</button>
                                </div>
                            </div>
                        </form>
                    
                    </div>
    
                </div>
            </div>
        </div>
        @endforeach
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