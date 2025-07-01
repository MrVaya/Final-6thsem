@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Page Header -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold text-primary mb-3">Terms & Conditions</h1>
            <p class="lead text-muted">Terms of service for using FutsalPro facilities and services</p>
            <p class="text-muted">Last updated: January 1, 2025</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <!-- Introduction -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Agreement to Terms</h3>
                    <p class="text-muted">
                        Welcome to FutsalPro. These Terms and Conditions ("Terms") govern your use of our facilities, services, and website. By accessing our facilities or using our services, you agree to be bound by these Terms. If you do not agree with any part of these Terms, please do not use our services.
                    </p>
                    <p class="text-muted">
                        FutsalPro reserves the right to modify these Terms at any time. Changes will be effective immediately upon posting on our website. Your continued use of our services after any changes constitutes acceptance of the new Terms.
                    </p>
                </div>
            </div>

            <!-- Facility Use -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Facility Use and Conduct</h3>
                    
                    <h5 class="fw-bold text-primary mb-3">General Rules</h5>
                    <ul class="text-muted mb-4">
                        <li>All players must wear appropriate indoor sports footwear (no outdoor shoes or cleats)</li>
                        <li>Professional behavior and sportsmanship are required at all times</li>
                        <li>Players must follow all posted facility rules and staff instructions</li>
                        <li>No alcohol, drugs, or smoking is permitted on the premises</li>
                        <li>Players under 18 must have parental consent and supervision as required</li>
                    </ul>

                    <h5 class="fw-bold text-primary mb-3">Safety Requirements</h5>
                    <ul class="text-muted mb-4">
                        <li>Players participate at their own risk and must be physically fit to play</li>
                        <li>Any injuries must be reported to staff immediately</li>
                        <li>Emergency contact information must be provided for all participants</li>
                        <li>Players with medical conditions must inform staff before playing</li>
                    </ul>

                    <h5 class="fw-bold text-primary mb-3">Prohibited Activities</h5>
                    <ul class="text-muted">
                        <li>Aggressive, violent, or unsportsmanlike conduct</li>
                        <li>Damage to facility property or equipment</li>
                        <li>Use of facility for unauthorized activities</li>
                        <li>Photography or recording without permission</li>
                        <li>Bringing outside food or beverages (except water)</li>
                    </ul>
                </div>
            </div>

            <!-- Bookings and Payments -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Bookings and Payments</h3>
                    
                    <h5 class="fw-bold text-primary mb-3">Booking Policy</h5>
                    <ul class="text-muted mb-4">
                        <li>All bookings must be made in advance through our website, phone, or in person</li>
                        <li>Bookings are confirmed only upon payment or approved credit arrangements</li>
                        <li>Court times are reserved for the specific duration booked</li>
                        <li>Late arrivals will not receive extended time</li>
                        <li>No-shows forfeit their booking and any fees paid</li>
                    </ul>

                    <h5 class="fw-bold text-primary mb-3">Payment Terms</h5>
                    <ul class="text-muted mb-4">
                        <li>Payment is due at the time of booking unless other arrangements are made</li>
                        <li>We accept cash, credit cards, and approved digital payment methods</li>
                        <li>Corporate accounts must maintain current payment information</li>
                        <li>Returned payments may incur additional fees</li>
                    </ul>

                    <h5 class="fw-bold text-primary mb-3">Cancellation and Refund Policy</h5>
                    <ul class="text-muted">
                        <li>Cancellations 24+ hours in advance: Full refund</li>
                        <li>Cancellations within 24 hours: 50% charge</li>
                        <li>No-shows: Full charge</li>
                        <li>Refunds will be processed within 5-7 business days</li>
                        <li>Weather-related cancellations by FutsalPro will receive full refunds</li>
                    </ul>
                </div>
            </div>

            <!-- Liability and Insurance -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Liability and Insurance</h3>
                    
                    <h5 class="fw-bold text-primary mb-3">Assumption of Risk</h5>
                    <p class="text-muted mb-3">
                        By using our facilities, you acknowledge that futsal and other sports activities carry inherent risks of injury. You voluntarily assume all risks associated with participation, including but not limited to:
                    </p>
                    <ul class="text-muted mb-4">
                        <li>Physical injury from sports activities</li>
                        <li>Injury from contact with other players or equipment</li>
                        <li>Slips, falls, or other accidents</li>
                        <li>Loss or damage to personal property</li>
                    </ul>

                    <h5 class="fw-bold text-primary mb-3">Limitation of Liability</h5>
                    <p class="text-muted mb-3">
                        FutsalPro's liability is limited to the maximum extent permitted by law. We are not liable for:
                    </p>
                    <ul class="text-muted mb-4">
                        <li>Personal injury or property damage during use of facilities</li>
                        <li>Theft or loss of personal belongings</li>
                        <li>Indirect, consequential, or punitive damages</li>
                        <li>Damages exceeding the amount paid for services</li>
                    </ul>

                    <h5 class="fw-bold text-primary mb-3">Insurance Requirements</h5>
                    <p class="text-muted">
                        We strongly recommend that all users maintain appropriate health and liability insurance. Team and league organizers may be required to provide proof of liability insurance for organized events.
                    </p>
                </div>
            </div>

            <!-- Equipment and Personal Property -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Equipment and Personal Property</h3>
                    
                    <h5 class="fw-bold text-primary mb-3">Facility Equipment</h5>
                    <ul class="text-muted mb-4">
                        <li>Goals, nets, and court markings are provided and maintained by FutsalPro</li>
                        <li>Damage to facility equipment may result in repair charges</li>
                        <li>Equipment rental items must be returned in good condition</li>
                        <li>Lost or damaged rental equipment will incur replacement fees</li>
                    </ul>

                    <h5 class="fw-bold text-primary mb-3">Personal Property</h5>
                    <ul class="text-muted">
                        <li>FutsalPro is not responsible for lost, stolen, or damaged personal items</li>
                        <li>Lockers are provided for convenience but are not guaranteed secure</li>
                        <li>Valuable items should not be left unattended</li>
                        <li>Lost and found items will be held for 30 days before disposal</li>
                    </ul>
                </div>
            </div>

            <!-- Privacy and Data Protection -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Privacy and Data Protection</h3>
                    <p class="text-muted mb-3">
                        Your privacy is important to us. Our collection and use of personal information is governed by our Privacy Policy, which is incorporated into these Terms by reference. By using our services, you consent to:
                    </p>
                    <ul class="text-muted">
                        <li>Collection of necessary personal and booking information</li>
                        <li>Use of information for service provision and communication</li>
                        <li>Storage of information in accordance with our data retention policies</li>
                        <li>Photography or video recording for promotional purposes (unless you opt out)</li>
                    </ul>
                </div>
            </div>

            <!-- Intellectual Property -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Intellectual Property</h3>
                    <p class="text-muted mb-3">
                        All content on our website and in our facilities, including logos, text, images, and designs, is the property of FutsalPro or our licensors. You may not:
                    </p>
                    <ul class="text-muted">
                        <li>Reproduce, distribute, or display our content without permission</li>
                        <li>Use our trademarks or logos without written consent</li>
                        <li>Create derivative works based on our content</li>
                        <li>Remove or alter any copyright or proprietary notices</li>
                    </ul>
                </div>
            </div>

            <!-- Termination -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Termination of Services</h3>
                    
                    <h5 class="fw-bold text-primary mb-3">By FutsalPro</h5>
                    <p class="text-muted mb-3">We reserve the right to terminate or suspend services for:</p>
                    <ul class="text-muted mb-4">
                        <li>Violation of these Terms or facility rules</li>
                        <li>Dangerous or inappropriate behavior</li>
                        <li>Non-payment of fees</li>
                        <li>Providing false information</li>
                        <li>Any reason at our sole discretion</li>
                    </ul>

                    <h5 class="fw-bold text-primary mb-3">By Users</h5>
                    <p class="text-muted">
                        You may discontinue use of our services at any time. Outstanding balances must be paid, and any prepaid services are subject to our refund policy.
                    </p>
                </div>
            </div>

            <!-- Dispute Resolution -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Dispute Resolution</h3>
                    
                    <h5 class="fw-bold text-primary mb-3">Informal Resolution</h5>
                    <p class="text-muted mb-3">
                        We encourage users to contact us first to resolve any disputes informally. Most issues can be resolved quickly through direct communication with our management team.
                    </p>

                    <h5 class="fw-bold text-primary mb-3">Formal Procedures</h5>
                    <p class="text-muted mb-3">
                        If informal resolution is unsuccessful, disputes will be resolved through:
                    </p>
                    <ul class="text-muted">
                        <li>Binding arbitration under the rules of the American Arbitration Association</li>
                        <li>Individual basis only (no class actions)</li>
                        <li>Governing law of the state where our primary facility is located</li>
                        <li>Jurisdiction in local courts for enforcement of arbitration awards</li>
                    </ul>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Contact Information</h3>
                    <p class="text-muted mb-3">
                        For questions about these Terms or any aspect of our services, please contact us:
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-muted mb-2"><strong>General Inquiries:</strong></p>
                            <p class="text-muted mb-2">Email: info@futsalpro.com</p>
                            <p class="text-muted mb-2">Phone: +1 (555) 123-4567</p>
                            <p class="text-muted mb-4">Address: 123 Sports Complex Drive, Futsal District, FD 12345</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-muted mb-2"><strong>Legal Matters:</strong></p>
                            <p class="text-muted mb-2">Email: legal@futsalpro.com</p>
                            <p class="text-muted mb-2">Phone: +1 (555) 123-4570</p>
                            <br>
                            <a href="{{ route('frontend.contact') }}" class="btn btn-primary">Contact Form</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
