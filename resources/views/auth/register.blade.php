@extends('layout.login')

@section('contenido')

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <img src="{{asset('images/logo/robust-logo-dark.png')}}" alt="branding logo">
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Create Account</span></h6>
            </div>
            <div class="card-body collapse in"> 
                <div class="card-block">
                    <form class="form-horizontal form-simple" method="POST" action="{{ route('register') }}" novalidate>
                        {{ csrf_field() }}
                        <fieldset class="form-group{{ $errors->has('name') ? ' has-error' : '' }} position-relative has-icon-left mb-1">
                            <input id="name" type="text" class="form-control form-control-lg input-lg" name="name" value="{{ old('name') }}" placeholder="User Name">
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </fieldset>
                        <fieldset class="form-group{{ $errors->has('email') ? ' has-error' : '' }} position-relative has-icon-left mb-1">
                            <input id="email" type="email" class="form-control form-control-lg input-lg" name="email" value="{{ old('email') }}" placeholder="Your Email Address" required>
                            <div class="form-control-position">
                                <i class="icon-mail6"></i>
                            </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </fieldset>
                        <fieldset class="form-group{{ $errors->has('password') ? ' has-error' : '' }} position-relative has-icon-left">
                            <input id="password" type="password" class="form-control form-control-lg input-lg" name="password" placeholder="Enter Password" required>
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input id="password-confirm" type="password" class="form-control form-control-lg input-lg" name="password_confirmation" placeholder="Confirm Password" required>
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Register</button>
                    </form>
                </div>
                <p class="text-xs-center">Already have an account ? <a href="{{ route('login') }}" class="card-link">Login</a></p>
            </div>
        </div>
    </div>
</section>
        </div>
      </div>
    </div>
@endsection
