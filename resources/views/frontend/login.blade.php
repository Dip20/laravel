@extends('frontend.layouts.default')
@section('content')
    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row block-9 justify-content-center">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="<?= url('login') ?>" class="bg-white p-5 contact-form">
                        <h3 class="text-center text-success">Login</h3>
                        @csrf

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="mobile" class="form-control" placeholder="**********" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Login" class="btn btn-primary btn-md">
                        </div>
                        <hr width="100%">
                        <div class="forget-password text-center">
                            <a href="<?= url('signup')?>" class="text-muted">New customer? Signup here</a>
                            |
                            <a href="<?= url('forget-password')?>" class="text-success">Forget Password?</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script>
        $(".contact-form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                method: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    alert("Success");
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                    alert("Something went wrong");
                }
            })
        })
    </script>
@endsection
