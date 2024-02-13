@extends('index')
@section('contant')

<div class="container">
   
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @foreach($errors->all() as $error)
            រូបភាពត្រូវមានទំហំតូចជាង 3MB
        @endforeach
        <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
    </div>
    
    @endif
    <div class="card text-center m-auto py-4 shadow" style="max-width: 20rem;">
        <img class="my-profile" src="{{Auth::User()->image ? '../../uploads/'.Auth::User()->image : '../../assets/img/logo.jpg'}}" class="card-img-top" alt="...">
        {{-- <img style="width: 150px; margin: auto; height: 150px; object-fit: cover; border-radius: 100%;" src="../../uploads/{{Auth::User()->image}}" class="card-img-top" alt="..."> --}}
        <div class="card-body">
            <p class="mb-0 h5" id="query">{{Auth::user()->name}}</p>
            @if(!Auth::user() == null)
                <small class="card-text">{{Auth::user()->birth}}</small>
            @endif
            <p class="card-text p-1 bg-light mt-1">{{Auth::user()->bio ? Auth::user()->bio : 'Hello b ya'}} </p>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mt-4" data-coreui-toggle="modal" data-coreui-target="#exampleModal">
                Edit profile
            </button>
        </div>
    </div>
</div>
 
  
  <!-- Modal Edit-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h3>Edit Your Profile {{Auth::user()->id}}</h3>
            <form class="needs-validation" novalidate action="{{url('update/'.Auth::user()->id)}}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Name</label>
                    <input type="text" class="form-control" name="user_name" id="validationCustom01" value="{{Auth::user()->name}}" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="birth" class="form-label">Birth Date</label>
                    <input type="date" name="birth" id="birth" class="form-control"   value="{{Auth::user()->birth}}">
                    
                </div>
                <div class="mb-3">
                  <label for="validationTextarea" class="form-label">Bio</label>
                  <textarea class="form-control" name="bio" id="validationTextarea" placeholder="Required example textarea" required>{{Auth::user()->bio ? Auth::user()->bio : 'Hello b ya'}}</textarea>
                  <div class="invalid-feedback">
                        Please enter a message in the textarea.
                  </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Profile image</label>
                    <input type="file" name="image" class="form-control" aria-label="file example" title="{{Auth::User()->image ? '../../uploads/'.Auth::User()->image : '../../assets/img/logo.jpg'}}"   accept="image/png, image/gif, image/jpeg">
                    <div class="invalid-feedback">Example invalid form file feedback</div>
                    <img src="{{Auth::User()->image ? '../../uploads/'.Auth::User()->image : '../../assets/img/logo.jpg'}}" style="width: 40px; height: 40px;" alt="">
                </div>
                {{-- @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif --}}
              
                <div class="mb-3">
                  <button class="btn btn-primary" type="submit" >Submit form</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection