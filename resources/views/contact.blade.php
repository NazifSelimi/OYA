<!-- resources/views/contact.blade.php -->
@extends('layouts.master')

@section('title', 'Contact Us - OYA')

@push('styles')
@endpush

@section('content')
    <div class="container">
        <h1>Contact Us</h1>
        <form class="contact-form">
            <div class="contact-form-labels">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name" required />

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your Email" required />

                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="Subject" required />

                <label for="message">Message</label>
                <textarea id="message" name="message" rows="6" placeholder="Your Message" required></textarea>
            </div>


            <button type="submit">Send Message</button>
        </form>
    </div>
@endsection
