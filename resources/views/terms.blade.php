@extends('layouts.index')

<style>
    @media only screen and (max-width: 768px) {
    .hide-on-mobile {
        display: none;
    }
}

 </style>

@section('content')
<div class = "container-fluid" style = "background: #CFD5DF;">
    <div class="row justify-content-between">
    <div class="col-lg-4 col-12 ms-5 p-5" >
      <h2 class = "h2 text-primary fw-bold">Terms of Service</h2>
      <p>Last Updated: December 2025</p>
    </div>
    <div class="col-lg-4 hide-on-mobile">
      <img src="{{ asset('images/terms.png') }}" class="img-fluid w-50" alt="terms of service">
    </div>
  </div>
</div>


<div class = "container">
    <div class = "row">
            <h5 class = "h5 mt-5 fw-bold" style = "color:#1A69AF;">Introduction</h5>
    <p>Welcome to Passnownow, an online learning platform designed to provide high-quality educational content and resources to students in Nigerian secondary schools as well as their parents and teachers. These Terms and Conditions ("Terms") govern your use of our platform, services, and content.</p>
</div>

</div>



<div class = "container" style = "color: #6B6B6B;">
    <div class = "row">
            <h5 class = "h5 mt-5 fw-bold" style = "color:#1A69AF;">Definitions</h5>

<ul style = "list-style-type: disc;" class = "ms-3">
    <li><span class = "fw-bold">"Platform"</span> refers to the Passnownow website, web app, and any other digital platforms we operate.</li>
    <li><span class = "fw-bold">"Services"</span> refers to the online courses, tutorials, resources and other educational content we provide.</li>
    <li><span class = "fw-bold">"Content"</span> refers to all text, images, videos, and other materials available on our platform.</li>
    <li><span class = "fw-bold">"User"</span> refers to anyone who accesses or uses our platform, services, or content.</li>
  </ul>
</div>



<div class = "row" style = "color: #6B6B6B;">
            <h5 class = "h5 mt-5 fw-bold" style = "color:#1A69AF;">User Agreement</h5>


<ol style = "list-style-type:decimal;" class = "ms-3">
    <li style = "font-family: quicksand; font-size:16px; font-weight:bold;">Eligibility</li>
    <p>You must be at least 13 years old to use our platform. If you are under 18, you must have parental or guardian consent to use our platform</p>

    <li style = "font-family: quicksand; font-size:16px; font-weight:bold;"> Registration and Account Security</li>
    <p>To access our services, you may need to create an account. You are responsible for maintaining the confidentiality and security of your account credentials</p>


    <li style = "font-family: quicksand; font-size:16px; font-weight:bold;">Intellectual Property</li>
    <p>All content on our platform is owned by or licensed to us. You may not reproduce, distribute, or display any content without our prior written consent.</p>

    <li style = "font-family: quicksand; font-size:16px; font-weight:bold;">User Generated Content</li>
    <p>You may submit feedback, suggestions, or other content to us. By doing so, you grant us a non-exclusive, royalty-free license to use, reproduce, and distribute your content</p>

    <li style = "font-family: quicksand; font-size:16px; font-weight:bold;">Disclaimers and Limitation</li>
    <p>We strive to provide accurate and helpful content, but we make no warranties or representations regarding the accuracy, completeness, or reliability of our services or content</p>

    <li style = "font-family: quicksand; font-size:16px; font-weight:bold;">Termination</li>
    <p>We may terminate or suspend your account or access to our services at any time, without notice, if we believe you have violated these Terms.</p>

    <li style = "font-family: quicksand; font-size:16px; font-weight:bold;">Governing Law</li>
    <p>These Terms shall be governed by and construed in accordance with the laws of the Federal Republic of Nigeria. Any disputes arising out of or related to these Terms shall be resolved through our dispute resolution process</p>

    <li style = "font-family: quicksand; font-size:16px; font-weight:bold;">Changes to Terms</li>
    <p>We may modify these Terms at any time, without notice. Your continued use of our platform, services, or content after any changes to these Terms constitutes your acceptance of the revised Terms.</p>
</ol>
<p>By using our platform, services, or content, you acknowledge that you have read, understood, and agree to be bound by these Terms.</p>
</div>

</div>
@endsection
