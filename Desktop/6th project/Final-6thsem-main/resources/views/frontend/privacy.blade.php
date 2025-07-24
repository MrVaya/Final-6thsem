@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Page Header -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold text-primary mb-3">Privacy Policy</h1>
            <p class="lead text-muted">How we collect, use, and protect your personal information</p>
            <p class="text-muted">Last updated: January 1, 2025</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <!-- Introduction -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Introduction</h3>
                    <p class="text-muted">
                        At FUTBOOK, we are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website, use our services, or interact with us.
                    </p>
                    <p class="text-muted">
                        By using our services, you agree to the collection and use of information in accordance with this policy. If you do not agree with our policies and practices, please do not use our services.
                    </p>
                </div>
            </div>

            <!-- Information We Collect -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Information We Collect</h3>
                    
                    <h5 class="fw-bold text-primary mb-3">Personal Information</h5>
                    <p class="text-muted mb-3">We may collect the following personal information:</p>
                    <ul class="text-muted mb-4">
                        <li>Name and contact information (email, phone, address)</li>
                        <li>Booking and payment information</li>
                        <li>Emergency contact details</li>
                        <li>Age and skill level (for coaching programs)</li>
                        <li>Health and medical information (when necessary for safety)</li>
                    </ul>

                    <h5 class="fw-bold text-primary mb-3">Automatically Collected Information</h5>
                    <p class="text-muted mb-3">When you visit our website, we may automatically collect:</p>
                    <ul class="text-muted mb-4">
                        <li>IP address and device information</li>
                        <li>Browser type and version</li>
                        <li>Pages visited and time spent on our site</li>
                        <li>Referral sources</li>
                        <li>Cookies and similar tracking technologies</li>
                    </ul>

                    <h5 class="fw-bold text-primary mb-3">Information from Third Parties</h5>
                    <p class="text-muted">
                        We may receive information about you from payment processors, social media platforms (if you choose to connect), and other business partners who help us provide our services.
                    </p>
                </div>
            </div>

            <!-- How We Use Information -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">How We Use Your Information</h3>
                    <p class="text-muted mb-3">We use your information for the following purposes:</p>
                    <ul class="text-muted">
                        <li><strong>Service Provision:</strong> Processing bookings, managing your account, and providing customer support</li>
                        <li><strong>Communication:</strong> Sending booking confirmations, updates, and responding to your inquiries</li>
                        <li><strong>Payment Processing:</strong> Handling transactions and billing</li>
                        <li><strong>Safety and Security:</strong> Ensuring the safety of our facilities and all users</li>
                        <li><strong>Marketing:</strong> Sending promotional offers and updates about our services (with your consent)</li>
                        <li><strong>Analytics:</strong> Improving our website and services based on usage patterns</li>
                        <li><strong>Legal Compliance:</strong> Meeting our legal obligations and protecting our rights</li>
                    </ul>
                </div>
            </div>

            <!-- Information Sharing -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">How We Share Your Information</h3>
                    <p class="text-muted mb-3">We may share your information in the following circumstances:</p>
                    
                    <h5 class="fw-bold text-primary mb-3">Service Providers</h5>
                    <p class="text-muted mb-3">We work with trusted third-party service providers who help us operate our business:</p>
                    <ul class="text-muted mb-4">
                        <li>Payment processors for secure transactions</li>
                        <li>Cloud storage providers for data management</li>
                        <li>Email service providers for communications</li>
                        <li>Analytics providers to improve our services</li>
                    </ul>

                    <h5 class="fw-bold text-primary mb-3">Legal Requirements</h5>
                    <p class="text-muted mb-3">We may disclose your information when required by law or to:</p>
                    <ul class="text-muted mb-4">
                        <li>Comply with legal processes or government requests</li>
                        <li>Protect our rights, property, or safety</li>
                        <li>Investigate potential violations of our terms</li>
                        <li>Prevent fraud or other illegal activities</li>
                    </ul>

                    <h5 class="fw-bold text-primary mb-3">Business Transfers</h5>
                    <p class="text-muted">
                        In the event of a merger, acquisition, or sale of assets, your information may be transferred to the new entity, subject to the same privacy protections.
                    </p>
                </div>
            </div>

            <!-- Data Security -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Data Security</h3>
                    <p class="text-muted mb-3">We implement appropriate security measures to protect your personal information:</p>
                    <ul class="text-muted mb-4">
                        <li>Encryption of sensitive data in transit and at rest</li>
                        <li>Regular security assessments and updates</li>
                        <li>Limited access to personal information on a need-to-know basis</li>
                        <li>Secure payment processing through certified providers</li>
                        <li>Regular staff training on data protection practices</li>
                    </ul>
                    <p class="text-muted">
                        While we strive to protect your information, no method of transmission over the internet or electronic storage is 100% secure. We cannot guarantee absolute security but are committed to protecting your data using industry-standard practices.
                    </p>
                </div>
            </div>

            <!-- Your Rights -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Your Rights and Choices</h3>
                    <p class="text-muted mb-3">You have the following rights regarding your personal information:</p>
                    <ul class="text-muted mb-4">
                        <li><strong>Access:</strong> Request a copy of the personal information we hold about you</li>
                        <li><strong>Correction:</strong> Ask us to correct any inaccurate or incomplete information</li>
                        <li><strong>Deletion:</strong> Request deletion of your personal information (subject to legal requirements)</li>
                        <li><strong>Portability:</strong> Request a copy of your data in a structured, machine-readable format</li>
                        <li><strong>Opt-out:</strong> Unsubscribe from marketing communications at any time</li>
                        <li><strong>Restriction:</strong> Request that we limit how we use your information</li>
                    </ul>
                    <p class="text-muted">
                        To exercise these rights, please contact us at privacy@futsalpro.com. We will respond to your request within 30 days and may require verification of your identity.
                    </p>
                </div>
            </div>

            <!-- Cookies and Tracking -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Cookies and Tracking Technologies</h3>
                    <p class="text-muted mb-3">We use cookies and similar technologies to:</p>
                    <ul class="text-muted mb-4">
                        <li>Remember your preferences and settings</li>
                        <li>Analyze website traffic and usage patterns</li>
                        <li>Provide personalized content and advertisements</li>
                        <li>Improve our website functionality and user experience</li>
                    </ul>
                    <p class="text-muted">
                        You can control cookie preferences through your browser settings. However, disabling cookies may affect the functionality of our website.
                    </p>
                </div>
            </div>

            <!-- Children's Privacy -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Children's Privacy</h3>
                    <p class="text-muted">
                        Our services are designed for users of all ages, including children participating in youth programs. We do not knowingly collect personal information from children under 13 without parental consent. If you are a parent or guardian and believe your child has provided us with personal information, please contact us immediately.
                    </p>
                </div>
            </div>

            <!-- Changes to Policy -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Changes to This Privacy Policy</h3>
                    <p class="text-muted">
                        We may update this Privacy Policy from time to time to reflect changes in our practices or for legal, operational, or regulatory reasons. We will notify you of any material changes by posting the new Privacy Policy on our website and updating the "Last updated" date. We encourage you to review this Privacy Policy periodically.
                    </p>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Contact Us</h3>
                    <p class="text-muted mb-3">If you have questions about this Privacy Policy or our privacy practices, please contact us:</p>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-muted mb-2"><strong>Email:</strong> privacy@futsalpro.com</p>
                            <p class="text-muted mb-2"><strong>Phone:</strong> +1 (555) 123-4567</p>
                            <p class="text-muted mb-2"><strong>Address:</strong></p>
                            <p class="text-muted">
                                FUTBOOK Privacy Office<br>
                                123 Sports Complex Drive<br>
                                Futsal District, FD 12345<br>
                                United States
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light rounded-4 p-4">
                                <h6 class="fw-bold text-primary mb-3">Quick Contact</h6>
                                <p class="text-muted small mb-2">For urgent privacy concerns, call us directly during business hours:</p>
                                <p class="text-muted small">Monday-Friday: 9:00 AM - 6:00 PM</p>
                                <a href="{{ route('frontend.contact') }}" class="btn btn-primary btn-sm">Contact Form</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection