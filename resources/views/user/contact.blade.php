@extends('layouts.user-base')

@section('title', 'Tarfeeh Venue-Page')

<!-- Blank Start -->
@section('content')

    <body class="contact-page">
        <header class="site-header">


            <div class="page-header contact-page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <header class="entry-header">
                                <h1 class="entry-title">Contact.</h1>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- .site-header -->

        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="contact-location-details">
                        <h2 class="entry-title">Jordan - Amman</h2>

                        <div class="entry-content">
                            <p>Contact us using the form below, or reach us via email or phone. We look forward to
                                connecting with you!</p>
                        </div>

                        <footer class="entry-footer">
                            <ul>
                                <li class="contact-address"><a href="https://maps.app.goo.gl/oEPz8FfrHTmXjk7U8">Ar-Razi St.
                                        141, Amman</a></li>
                                <li class="contact-number"><a href="tel:+962 79 067 4575">+962 79 067 4575</a></li>
                                <li class="contact-email"><a href="mailto:Abdallah.almomany@gmaik.com">Tarfeeh@gmail.com</a>
                                </li>
                            </ul>
                        </footer>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-8">
                    <div class="contact-page-map">
                        <iframe id="gmap_canvas"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3384.6654822646647!2d35.9092208!3d31.96997069999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca12ce1b9c62b%3A0x21b9b701f3f4ee86!2sOrange%20Coding%20Academy!5e0!3m2!1sen!2sjo!4v1735316610552!5m2!1sen!2sjo"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </div>
            </div>
        </div>



        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        <h1 class="center-the-title">Contact Form</h1>
                        @if (auth()->check())
                            {{-- Form for logged-in users --}}
                            <form class="row" action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="col-12 col-md-4">
                                    <input type="text" value="{{ auth()->user()->user_name }}" readonly>
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="email" name="email" placeholder="E-mail" required>
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="text" name="subject" placeholder="Subject" required>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" placeholder="Message" rows="8" required></textarea>
                                </div>
                                <div class="col-12 flex justify-content-center">
                                    <input class="btn gradient-bg" type="submit" value="Send Message">
                                </div>
                            </form>
                        @else
                            {{-- Form for guests (not logged-in users) --}}
                            <form class="row" id="emailJsForm">
                                <div class="col-12 col-md-4">
                                    <input type="text" name="name" placeholder="Name" required>
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="email" name="email" placeholder="E-mail" required>
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="text" name="subject" placeholder="Subject" required>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" placeholder="Message" rows="8" required></textarea>
                                </div>
                                <div class="col-12 flex justify-content-center">
                                    <button type="button" id="emailJsSubmit" class="btn gradient-bg">Send Message</button>
                                </div>
                            </form>
                        @endif


                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
        <script>
            emailjs.init('P0IXlV_ZSPKaHX3LJ'); // Replace with your EmailJS user ID

            document.getElementById('emailJsSubmit').addEventListener('click', function() {
                const form = document.getElementById('emailJsForm');
                const formData = new FormData(form);

                emailjs.sendForm('service_mb0s404', 'template_kp4d1em', form)
                    .then(function(response) {
                        alert('Message sent successfully!');
                        form.reset(); // Clear the form
                    })
                    .catch(function(error) {
                        console.error('Error:', error);
                        alert('Failed to send message. Please try again.');
                    });
            });
        </script>


    @endsection('content')
