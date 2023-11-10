@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
                <h1 class="display-5 mb-3 text-danger">
                    <span class="text-dark">Contact</span> Foody<span class="text-warning">Me</span>
                </h1>
                <p class="lead">
                    You can contact use via our social handles.
                    if you want to report a problem or speak to us on anything related to business.
                </p>
                <div class="mt-5">
                    <a href="" class="btn btn-outline-primary rounded-0">
                        <i class="bi bi-facebook"></i>
                        Facebook
                    </a>
                    <a href="" class="btn btn-outline-danger rounded-0 mx-2">
                        <i class="bi bi-instagram"></i>
                        Instagram
                    </a>
                    <a href="" class="btn btn-outline-primary rounded-0">
                        <i class="bi bi-twitter"></i>
                        Twitter
                    </a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <img src="assets/chef4.png" width="2000" height="1000" class="img-fluid" alt="image">
            </div>
        </div>
    </div>

    <div class="container-fluid text-center mt-5">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15858.94015006691!2d3.4116446349885092!3d6.4280766699487755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf53280e7648d%3A0x4d01e5de6b847fe5!2sVictoria%20Island%2C%20Lagos!5e0!3m2!1sen!2sng!4v1699657481059!5m2!1sen!2sng"
            width="1330" height="600" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="container mt-5" style="
        max-width: 700px;
        margin: 0 auto;
    ">
        <h1 class="my-3 text-center">Send Us a Message</h1>
        <form action="mailto:ademolademilade362@gmail.com" method="post" enctype="text/plain">
            Name:<br>
            <input type="text" size="19" name="Contact-Name" class="form-control mb-3">
            Email:<br>
            <input type="email" name="Contact-Email" class="form-control mb-3">
            Message:<br>
            <textarea name="Contact-Message" class="form-control mb-3" rows="6″ cols="20″>
    </textarea><br><br>
            <button type="submit" class="btn btn-warning col-12" value="Submit">Send</button>
        </form>
    </div>
@endsection
