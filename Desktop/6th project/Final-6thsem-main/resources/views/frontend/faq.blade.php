@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Page Header -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold text-primary mb-3">Frequently Asked Questions</h1>
            <p class="lead text-muted">Find answers to common questions about our services and facilities</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- FAQ Categories -->
            <div class="row mb-5">
                <div class="col-12">
                    <ul class="nav nav-pills justify-content-center mb-4" id="faqTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="booking-tab" data-bs-toggle="pill" data-bs-target="#booking" type="button" role="tab">Booking</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="facilities-tab" data-bs-toggle="pill" data-bs-target="#facilities" type="button" role="tab">Facilities</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pricing-tab" data-bs-toggle="pill" data-bs-target="#pricing" type="button" role="tab">Pricing</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="general-tab" data-bs-toggle="pill" data-bs-target="#general" type="button" role="tab">General</button>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- FAQ Content -->
            <div class="tab-content" id="faqTabContent">
                <!-- Booking FAQ -->
                <div class="tab-pane fade show active" id="booking" role="tabpanel">
                    <div class="accordion accordion-flush" id="bookingAccordion">
                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#booking1">
                                    How do I book a futsal court?
                                </button>
                            </h2>
                            <div id="booking1" class="accordion-collapse collapse" data-bs-parent="#bookingAccordion">
                                <div class="accordion-body">
                                    You can book a court through our website by clicking "Book Now" on any venue page, calling us directly at +1 (555) 123-4568, or visiting our facility in person. We recommend booking in advance, especially for peak hours and weekends.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#booking2">
                                    How far in advance can I book?
                                </button>
                            </h2>
                            <div id="booking2" class="accordion-collapse collapse" data-bs-parent="#bookingAccordion">
                                <div class="accordion-body">
                                    You can book courts up to 30 days in advance. For regular bookings or league play, we offer special arrangements for longer-term reservations.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#booking3">
                                    What is your cancellation policy?
                                </button>
                            </h2>
                            <div id="booking3" class="accordion-collapse collapse" data-bs-parent="#bookingAccordion">
                                <div class="accordion-body">
                                    Cancellations made 24 hours before your booking time receive a full refund. Cancellations within 24 hours are subject to a 50% charge. No-shows are charged the full amount.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#booking4">
                                    Can I modify my booking?
                                </button>
                            </h2>
                            <div id="booking4" class="accordion-collapse collapse" data-bs-parent="#bookingAccordion">
                                <div class="accordion-body">
                                    Yes, you can modify your booking up to 2 hours before the scheduled time, subject to court availability. Contact us at +1 (555) 123-4568 or email bookings@futsalpro.com to make changes.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Facilities FAQ -->
                <div class="tab-pane fade" id="facilities" role="tabpanel">
                    <div class="accordion accordion-flush" id="facilitiesAccordion">
                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#facilities1">
                                    What amenities are included with court rental?
                                </button>
                            </h2>
                            <div id="facilities1" class="accordion-collapse collapse" data-bs-parent="#facilitiesAccordion">
                                <div class="accordion-body">
                                    All court rentals include air conditioning, professional lighting, changing rooms, showers, and basic equipment (goals and nets). Parking is also complimentary for all players.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#facilities2">
                                    Do you provide equipment rental?
                                </button>
                            </h2>
                            <div id="facilities2" class="accordion-collapse collapse" data-bs-parent="#facilitiesAccordion">
                                <div class="accordion-body">
                                    Yes, we offer equipment rental including futsal balls ($3), indoor shoes (sizes 5-13, $5), jerseys/bibs ($3), and goalkeeper gloves ($4). All equipment is professionally cleaned and maintained.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#facilities3">
                                    Are your facilities accessible?
                                </button>
                            </h2>
                            <div id="facilities3" class="accordion-collapse collapse" data-bs-parent="#facilitiesAccordion">
                                <div class="accordion-body">
                                    Yes, all our facilities are fully ADA compliant with wheelchair accessible entrances, restrooms, and spectator areas. We also have accessible parking spaces available.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#facilities4">
                                    Can spectators watch games?
                                </button>
                            </h2>
                            <div id="facilities4" class="accordion-collapse collapse" data-bs-parent="#facilitiesAccordion">
                                <div class="accordion-body">
                                    Absolutely! We have comfortable spectator seating areas overlooking all courts. Spectators can enjoy complimentary WiFi and access to our snack bar during their visit.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pricing FAQ -->
                <div class="tab-pane fade" id="pricing" role="tabpanel">
                    <div class="accordion accordion-flush" id="pricingAccordion">
                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#pricing1">
                                    What are your court rental rates?
                                </button>
                            </h2>
                            <div id="pricing1" class="accordion-collapse collapse" data-bs-parent="#pricingAccordion">
                                <div class="accordion-body">
                                    Standard rates are $25/hour during off-peak times (Mon-Fri 9AM-5PM) and $35/hour during peak times (weekends and evenings after 5PM). Youth bookings receive a 20% discount.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#pricing2">
                                    Do you offer group discounts?
                                </button>
                            </h2>
                            <div id="pricing2" class="accordion-collapse collapse" data-bs-parent="#pricingAccordion">
                                <div class="accordion-body">
                                    Yes! Groups booking 10+ hours per month receive a 15% discount. Corporate packages and league registrations also receive special pricing. Contact us for custom quotes.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#pricing3">
                                    What payment methods do you accept?
                                </button>
                            </h2>
                            <div id="pricing3" class="accordion-collapse collapse" data-bs-parent="#pricingAccordion">
                                <div class="accordion-body">
                                    We accept all major credit cards (Visa, MasterCard, American Express), debit cards, cash, and digital payments (Apple Pay, Google Pay). Corporate accounts with invoicing are also available.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#pricing4">
                                    Are there any additional fees?
                                </button>
                            </h2>
                            <div id="pricing4" class="accordion-collapse collapse" data-bs-parent="#pricingAccordion">
                                <div class="accordion-body">
                                    No hidden fees! Our quoted price includes court rental, basic amenities, and parking. The only additional costs are optional equipment rentals and special services like professional refereeing.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- General FAQ -->
                <div class="tab-pane fade" id="general" role="tabpanel">
                    <div class="accordion accordion-flush" id="generalAccordion">
                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#general1">
                                    What are your operating hours?
                                </button>
                            </h2>
                            <div id="general1" class="accordion-collapse collapse" data-bs-parent="#generalAccordion">
                                <div class="accordion-body">
                                    We're open Monday-Friday 6:00 AM to 11:00 PM, and weekends 7:00 AM to 10:00 PM. Holiday hours may vary - please check our website or call for special holiday schedules.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#general2">
                                    Do you offer coaching services?
                                </button>
                            </h2>
                            <div id="general2" class="accordion-collapse collapse" data-bs-parent="#generalAccordion">
                                <div class="accordion-body">
                                    Yes! We offer individual coaching ($40/session), group training ($25/person), and specialized clinics. Our certified coaches work with all skill levels from beginners to competitive players.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#general3">
                                    Can you host tournaments and events?
                                </button>
                            </h2>
                            <div id="general3" class="accordion-collapse collapse" data-bs-parent="#generalAccordion">
                                <div class="accordion-body">
                                    Absolutely! We specialize in tournament organization, corporate events, birthday parties, and league management. Our event team handles everything from scheduling to awards ceremonies.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#general4">
                                    What safety measures do you have in place?
                                </button>
                            </h2>
                            <div id="general4" class="accordion-collapse collapse" data-bs-parent="#generalAccordion">
                                <div class="accordion-body">
                                    Player safety is our priority. All courts have safety padding, first aid stations, and trained staff on-site. We maintain comprehensive insurance coverage and follow all local health and safety regulations.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border rounded-4 mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#general5">
                                    Do you have a loyalty program?
                                </button>
                            </h2>
                            <div id="general5" class="accordion-collapse collapse" data-bs-parent="#generalAccordion">
                                <div class="accordion-body">
                                    Yes! Our FutsalPro Rewards program offers points for every booking, equipment rental, and coaching session. Members receive exclusive discounts, priority booking, and special event invitations.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Still Have Questions -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card bg-light border-0 rounded-4">
                <div class="card-body text-center py-5">
                    <h3 class="fw-bold text-primary mb-3">Still Have Questions?</h3>
                    <p class="lead text-muted mb-4">Can't find what you're looking for? Our friendly team is here to help!</p>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="{{ route('frontend.contact') }}" class="btn btn-primary btn-lg px-4">
                            <svg width="20" height="20" class="me-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            Contact Us
                        </a>
                        <a href="tel:+15551234568" class="btn btn-outline-primary btn-lg px-4">
                            <svg width="20" height="20" class="me-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                            Call Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection