@extends('frontend.layouts.default')
@section('content')
    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row block-9 justify-content-center">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="<?= url('signup') ?>" class="bg-white p-5 contact-form">
                        <h3 class="text-center text-success">Signup</h3>
                        @csrf

                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Create Password</label>
                            <input type="password" name="mobile" class="form-control" placeholder="**********" required>
                        </div>

                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="mobile" class="form-control" placeholder="**********" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Signup" class="btn btn-primary btn-md">
                        </div>
                        <hr width="100%">
                        <div class="forget-password text-center">
                            <a href="<?= url('login')?>" class="text-muted">Already have account? login here</a>
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
