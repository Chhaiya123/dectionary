@extends('layout')

@section('content')
        <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
          <div class="container-sm">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <div class="card mb-4">
                    <form action="{{ route('store') }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        <div class="card-body p-4">
                            <h1>Register</h1>
                            <p class="text-medium-emphasis">Create your account</p>
                            <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
            
                                </svg></span>
                                <input class="form-control" type="text" placeholder="Username" id="name" name="name" required>
                                @if ($errors->has('name'))
                                    <small class="text-danger w-100">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                            <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                </svg></span>
                                <input class="form-control" type="text" placeholder="Email" id="email" name="email" required>
                                @if ($errors->has('email'))
                                    <small class="text-danger w-100">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                            <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                </svg></span>
                                <input class="form-control" type="password" placeholder="Password" id="password" name="password" required>
                                @if ($errors->has('password'))
                                    <small class="text-danger w-100">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                            <div class="input-group mb-4"><span class="input-group-text">
                                <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                </svg></span>
                                <input class="form-control" type="password" placeholder="Repeat password" id="repass" name="password_confirmation" required>
                            </div>
                            <button class="btn btn-block btn-success" type="submit">Create Account</button>
                            <div class="mt-3">
                                Do you have account? <a class="link" href="{{route('login')}}">Login </a>
                            </div> 
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection