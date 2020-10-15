@include('layouts/mainlayout')



<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

                <div class="card-body" style="margin-left: 20%;">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul style="padding: 0px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header">{{ $title }}</div>
                    <form method="POST" action="{{ route($loginRoute) }}">
                        @csrf

                        <div class="form-group row-start">
                            <div class="col md-6">
                                <input id="login" type="login" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>
                                <label> Login </label>
                            </div>
                        </div>

                        <div class="form-group row-password">

                            <div class="col md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <label> Password </label>
                            </div>
                        </div>

                        <div class="row-extra">
                            <div class="col md-6offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row-mb-0">
                            <div class="col md-8-offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
</body>
