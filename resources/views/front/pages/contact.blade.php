@extends('front.layout.master')

@section('title') {{ __('menu.elaqe') }}  @endsection
@section('css')

@endsection

@section('content')
    <!-- MAIN -->
    <main>
        <article class="article " style="margin-top: 10rem;">
            <header class="article__header">
                <div class="container">
                    <h1 class="article__heading heading heading--size-large">{{ __('menu.elaqe') }}</h1>
                </div>
            </header>
            <div class="article__main container">
                <section class="article__feedback feedback">
                    <!-- <h2 class="feedback__heading heading" data-aos="fade">Let's grab a coffee and jump on
                      <br>conversation <span class="color-yellow">chat with us.</span>
                    </h2> -->
                    <form action="{{ route('front.contact.post') }}" method="POST" onsubmit="return false">
                        <div class="row">
                            <div class="feedback__field-wrapper col-12 col-md-6 col-lg-4" data-aos="fade">
                                <label class="field" aria-label="Name">
                                    <input type="text" name="name" id="name" placeholder="{{ __('menu.name') }}">
                                </label>
                                <small class="text-danger" id="name-error"></small>
                            </div>
                            <div class="feedback__field-wrapper col-12 col-md-6 col-lg-4" data-aos="fade">
                                <label class="field" aria-label="Email">
                                    <input type="email" name="email" id="email2" placeholder="{{ __('menu.email') }}">
                                </label>
                                <small class="text-danger" id="email-error"></small>
                            </div>
                            <div class="feedback__field-wrapper col-12 col-lg-4" data-aos="fade">
                                <label class="field" aria-label="Subject">
                                    <input type="text" name="subject" id="subject" placeholder="{{ __('menu.subject') }}">
                                </label>
                                <small class="text-danger" id="subject-error"></small>
                            </div>
                            <div class="feedback__field-wrapper col-12" data-aos="fade">
                                <label class="field" aria-label="message">
                                    <textarea name="message" id="message" placeholder="{{ __('menu.message') }}"></textarea>
                                </label>
                                <small class="text-danger" id="message-error"></small>
                            </div>
                        </div>
                        <button class="btn" type="button" data-aos="fade" id="contactBtn">{{ __('menu.submit') }}</button>
                    </form>
                </section>
            </div>
        </article>
    </main>
    <!-- MAIN -->
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $('#contactBtn').click(function () {
                $('#name-error').html('');
                $('#email-error').html('');
                $('#message-error').html('');
                let name    = $('#name').val();
                let email   = $('#email2').val();
                let subject = $('#subject').val();
                let message = $('#message').val();
                $.ajax({
                    url: '{!! route('front.contact.post') !!}',
                    type: 'POST',
                    data: {
                        name: name,
                        email: email,
                        subject: subject,
                        message: message
                    },
                    success: function (data) {
                        toastr.success(data.message);
                        $('#contactForm').trigger("reset");
                    },
                    error: function (data) {
                        var errors = data.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function (key, value) {
                                $('#'+key+'-error').html(value);
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
