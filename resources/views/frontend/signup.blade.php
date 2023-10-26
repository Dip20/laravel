@extends('frontend.layouts.default')
@section('content')
<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row block-9 justify-content-center">
            <div class="col-md-6 order-md-last d-flex">



                <form action="<?= url('signup') ?>" class="bg-white p-5 contact-form" method="post">
                    <h3 class="text-center text-success">Signup</h3>
                    @if (session('msg'))
                    <div class="alert alert-success">
                        {{ session('msg') }}
                    </div>
                    @endif

                    @csrf

                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Your Name">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Your Email">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="">Create Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="**********">
                    </div>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="**********">
                    </div>
                    @error('confirm_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <input type="submit" value="Signup" class="btn btn-primary btn-md">
                    </div>
                    <hr width="100%">
                    <div class="forget-password text-center">
                        <a href="<?= url('login') ?>" class="text-muted">Already have account? login here</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection


@section('scripts')
<script>
    // $(".contact-form").submit(function(e) {
    //     e.preventDefault();
    //     $.ajax({
    //         method: "post",
    //         url: $(this).attr('action'),
    //         data: $(this).serialize(),
    //         success: function(response) {
    //             alert("Success");
    //             location.reload();
    //         },
    //         error: function(error) {
    //             console.log(error);
    //             alert("Something went wrong");
    //         }
    //     })
    // })
</script>
@endsection