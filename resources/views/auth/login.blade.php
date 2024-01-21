@extends('layout')

@section('content')
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card-group d-block d-md-flex row">
              <div class="card col-md-7 p-4 mb-0">
                <div class="card-body">
                  <form method="POST" action="{{ route('authenticate') }}" class=" needs-validation" novalidate>
                        @csrf
                        <h1>Login</h1>
                        <p class="text-medium-emphasis">Sign In to your account</p>
                        {{-- @if ($errors->has('user_email'))
                          <div class="alert alert-danger fade show" role="alert">
                            {{ $errors->first('user_email') }}
                            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          <script>
                            var alertList = document.querySelectorAll(".alert");
                            alertList.forEach(function (alert) {
                              new bootstrap.Alert(alert);
                            });
                          </script>
                        @endif --}}
                        
                        <div class="input-group"><span class="input-group-text">
                            <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                            </svg></span>
                            <input class="form-control" type="email" placeholder="Username" id="email" name="email" aria-describedby="inputGroupPrepend2" required>
                        </div> 
                        <div class="mb-3">
                          @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                          @endif
                        </div>
                        <div class="input-group"><span class="input-group-text">
                            <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                            </svg></span>
                            <input class="form-control" type="password" placeholder="Password" id="password" name="password" required>
     
                        </div>
                        <div class="mb-4">
                          @if ($errors->has('password'))
                            <span class="text-danger mb-3">{{ $errors->first('password') }}</span>
                          @endif
                        </div>
                       
                        
                        <div class="row">
                            <div class="col-6">
                            <button class="btn btn-primary px-4" type="submit">Login</button>
                            </div>
                            <div class="col-6 text-end">
                            <button class="btn btn-link px-0" type="button">Forgot password?</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
              <div class="card col-md-5 text-white bg-primary bg-img">
                <div class="row h-100">
                  <div class="bg-color py-5">
                    <div class="card-body text-center">
                      <div>
                        <h2>Sign up</h2>
                        <p>Welcome ...</p>
                        <a class="btn btn-lg btn-outline-light mt-3" href="{{route('register')}}">Register Now!</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection