
@extends('index')
@section('contant')

        <div class="card p-3">
            <div class="col-8 m-auto">
                <h3>Update Word {{$data_up->word_id}}</h3>
                <form class="row needs-validation" action="{{url('wordupdate/'.$data_up->word_id)}}" method="post" novalidate>
                    @csrf
                    @method('put')
                    <div class="row g-3" >
                        <div class="col-md-12">
                            <label for="word" class="form-label">Word</label>
                            <input type="text" class="form-control" id="word" name="word" value="{{$data_up->word}}" placeholder="Input word" required>
                            
                        </div>
                        <div class="col-md-12">
                            <label for="des" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="des" placeholder="Input description" required style="width: 100%; height: 200px;">{{$data_up->description}}</textarea>
                            
                        </div>
                        
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                            <button class="btn text-light btn-danger" type="button">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



@endsection