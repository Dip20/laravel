@extends('frontend.layouts.default')
@section('content')
    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row block-9 justify-content-center">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="<?= url('login') ?>" class="bg-white p-5 contact-form" method="post">
                        <h3 class="text-center text-success">Login</h3>
                        @csrf
                        @if (session('msg'))
                            <div class="alert alert-<?= session('st') == 'success' ? 'success' : 'danger' ?>">
                                {{ session('msg') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="Your Email">
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="**********">
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <input type="submit" value="Login" class="btn btn-primary btn-md">
                        </div>
                        <hr width="100%">
                        <div class="forget-password text-center">
                            <a href="<?= url('signup') ?>" class="text-muted">New customer? Signup here</a>
                            |
                            <a href="<?= url('forget-password') ?>" class="text-success">Forget Password?</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
@endsection
