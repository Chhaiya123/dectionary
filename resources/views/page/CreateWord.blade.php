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
                        {{-- input franch --}}
                        <div class="col-md-12 col-lg-4">
                            <label for="word" class="form-label">Word <span class="text-light badge rounded-pill bg-primary">French</span></label>
                            <input type="text" class="form-control" id="word" name="word" placeholder="Input word" required>
                            @foreach($errors->get('word') as $error)
                                <small class="text-danger">{{ $error }}</small>
                            @endforeach
                        </div>
                        {{-- input khmer --}}
                        <div class="col-md-12 col-lg-4">
                            <label for="word_km" class="form-label">Word <span class="text-light badge rounded-pill bg-danger">Khmer</span></label>
                            <input type="text" class="form-control" id="word_km" name="word_km" placeholder="Input word Khmer" required>
                            @foreach($errors->get('word_km') as $error)
                                <small class="text-danger">{{ $error }}</small>
                            @endforeach
                        </div>
                        {{-- input english --}}
                        <div class="col-md-12 col-lg-4">
                            <label for="word_en" class="form-label">Word <span class="text-light badge rounded-pill bg-success">English</span></label>
                            <input type="text" class="form-control" id="word_en" name="word_en" placeholder="Input word english" required>
                            @foreach($errors->get('word_en') as $error)
                                <small class="text-danger">{{ $error }}</small>
                            @endforeach
                        </div>
                        {{-- description frarnch --}}
                        <div class="col-md-12">
                            <label for="des" class="form-label">Description <span class="text-light badge rounded-pill bg-primary">French</span></label>
                            <textarea class="form-control" name="description" id="des" placeholder="Input description" required style="width: 100%; height: 100px;"></textarea>
                            @foreach($errors->get('description') as $error)
                                <small class="text-danger">{{ $error }}</small>
                            @endforeach
                        </div>
                        {{-- description khmer --}}
                        <div class="col-md-12">
                            <label for="des_km" class="form-label">Description <span class="text-light badge rounded-pill bg-danger">Khmer</span></label>
                            <textarea class="form-control" name="description_km" id="des_km" placeholder="Input description khmer" required style="width: 100%; height: 100px;"></textarea>
                            @foreach($errors->get('description_km') as $error)
                                <small class="text-danger">{{ $error }}</small>
                            @endforeach
                        </div>
                        {{-- description english --}}
                        <div class="col-md-12">
                            <label for="des_en" class="form-label">Description <span class="text-light badge rounded-pill bg-success">English</span></label>
                            <textarea class="form-control" name="description_en" id="des_en" placeholder="Input description english" required style="width: 100%; height: 100px;"></textarea>
                            @foreach($errors->get('description') as $error)
                                <small class="text-danger">{{ $error }}</small>
                            @endforeach
                        </div>
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