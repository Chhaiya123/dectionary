@extends('index')
@section('contant')

    {{-- @guest
    
    @else --}}
        <div class="card p-3">
            <div class="col-12 col-md-8 m-auto p-0">
                <h3>Create Word</h3>
                <form class="needs-validation" action="{{route('word.store')}}" method="post" novalidate>
                    @csrf
                    @method('post')
                    <div class="row g-3" >
                        <div class="col-md-12">
                            <label for="word" class="form-label">Word</label>
                            <input type="text" class="form-control" id="word" name="word" placeholder="Input word" required>
                            @foreach($errors->get('word') as $error)
                                <small class="text-danger">{{ $error }}</small>
                            @endforeach
                            
                        </div>
                        <div class="col-md-12">
                            <label for="des" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="des" placeholder="Input description" required style="width: 100%; height: 200px;"></textarea>
                        </div>
                        @foreach($errors->get('description') as $error)
                            <small class="text-danger">{{ $error }}</small>
                        @endforeach
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                            <a class="btn text-light btn-danger"href="{{route('words')}}">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    {{-- @endguest --}}



@endsection