@extends('index')
@section('contant')
    @guest
    <div class="container-fluid vh-100 " style="background-color: #1a202c;">
        <div class="row h-100 ">
            <p class="text-light" style="width: 100%; height:100%; display:flex; justify-content: center;
            align-items: center; font-size: 1.125rem;color: #a0aec0;" >404 | NOT FOUND </p>
        </div>
        
    </div>
    @else
    <div class="container-fluid">
        <div class="d-flex justify-content-between gap-3 align-content-center">
                <div>
                    
                    <form action="{{ route('search') }}" method="GET" style="max-width: 700px;">
                        <div class="input-group w-100">
                            <input  type="text" name="query" class="form-control " placeholder="Search word..." aria-label="Username" aria-describedby="basic-addon1">
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
                            <th scope="col">Words</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if($results as $dt) --}}
                        @forelse($data as $dt)
                            <tr>
                                <th width="50px" scope="row">{{$dt->word_id}}</th>
                                <td class="text-nowrap">{{$dt->word}}</td>
                                <td class="description">{{$dt->description}}</td>
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
                                                        @foreach($errors->get('word') as $error)
                                                            <small class="text-danger">{{ $error }}</small>
                                                        @endforeach
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="des" class="form-label text-uppercase">Description</label>
                                                        <textarea class="form-control" name="description" id="des" placeholder="Input description" required style="width: 100%; height: 200px;">{{$dt->description}}</textarea>
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
        
        {{-- {!!$data->withQueryString()->links('pagination::bootstrap-5') !!} --}}
    </div>
    @endguest
    @if($errors->any())
        <div id="seccas-alert" class="toast show position-absolute" style="bottom: 20px; right: 20px;" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-black text-warning">
                <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-warning"></use>
                </svg> 
                <strong class="me-auto"> Message</strong>
                <button type="button" class="btn-close bg-white" data-coreui-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                @foreach($errors->all() as $error)
                <strong><svg class="icon me-1 text-danger">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-right"></use>
                </svg> {{$error}}</strong><br>
                @endforeach
            </div>
        </div>
        <script>
            var seccasAlert = document.getElementById('seccas-alert');
            seccasAlert.style.transition = 'opacity 1s';
            
            setTimeout(function() {
                seccasAlert.style.opacity = '0';
            }, 4000);
            setTimeout(function() {
                seccasAlert.style.display = 'none';
            }, 6000); 
        </script>
    @endif

    
   
     
@endsection