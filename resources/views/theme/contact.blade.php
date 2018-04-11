@extends('theme.layouts.master')

@section('pageClass', 'contact')
@section('pageTitle', 'Contact Us')

@section('content')

<section class="contact">
    <div class="contact__container container">
        <div class="breadcrumbs-wrapper column-12">
            <breadcrumbs url="{{ app('request')->url() }}"></breadcrumbs>
        </div>
        
        <div class="map column-12">
            <div id="map"></div>
        </div>

        <div class="contact-details container container-full">
            <div class="column-4">
                <p>Essex Appliance Center is proud to be celebrating its 30th Anniversary in July of 2016 offering the widest selection of home appliances in the area. Locally owned and operated by Gord and Cathy Stevens, Essex Appliance is "flexible in everyone's pocket book," offering both low priced, high volume value brands and competitively priced premium brands.</p>

                <div class="field address">
                    <i class="fas fa-home"></i>
                    <p>76 Talbot St S, Essex, ON, N8M 1A9</p>
                </div>

                <div class="field phone">
                    <i class="fas fa-phone"></i>
                    <p>1.519.776.6316</p>
                </div>

                <div class="field email">
                    <i class="fas fa-envelope"></i>
                    <p>sales@essexappliance.com</p>
                </div>
            </div>

            <div class="column-8">
                <p>Send us an email. All fields marked with an * are required.</p>
                <form action="{{ route('contact') }}" method="post" class="form">
                    @csrf
                    <div class="container container-full">
                        <div class="column-6">
                            <input type="text" name="name" placeholder="Name *" required>
                            <input type="email" name="email" placeholder="E-mail *" required>
                            <input type="tel" name="phone" placeholder="Telephone">
                        </div>

                        <div class="column-6">
                            <textarea name="message" placeholder="Comment *" required></textarea>
                            <button class="button submit">Send Email</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <hr>
    </div>
</section>

@endsection