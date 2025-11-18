@extends('main.app')
@section('content')
    <section id="terms-of-service" class="terms-of-service section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Terms of Service</h2>
            <p>Last Updated: October 13, 2025</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="content">
                <h4 class="fw-bold">Welcome to {{ $siteName ?? 'IVS' }}</h4>
                <p class="lh-lg">
                    Thank you for choosing {{ $siteName ?? 'IVS' }} for your travel document needs. These Terms of Service 
                    ("Terms") govern your access to and use of our website, services, and products. By accessing or using 
                    our services, you agree to be bound by these Terms and all applicable laws and regulations. If you do 
                    not agree with any part of these Terms, you must discontinue use of our services immediately.
                </p>

                <h5 class="fw-bold">1. SERVICE DESCRIPTION</h5>
                <p class="lh-lg">
                    {{ $siteName ?? 'IVS' }} provides comprehensive passport application assistance services. Our platform 
                    offers form completion support, document review, compliance verification, photo specification checking, 
                    and application submission guidance. We act as an intermediary service provider to help streamline your 
                    passport application process, but we do not guarantee approval or processing times by government authorities.
                </p>
                <p class="lh-lg">
                    <strong>Important Clarification:</strong> {{ $siteName ?? 'IVS' }} operates as a private service provider 
                    and maintains no affiliation with any U.S. government agency or foreign governmental entity. We do not 
                    issue travel documents, visas, or passports. All final determinations regarding application approval remain 
                    solely with the respective government authorities.
                </p>

                <h5 class="fw-bold">2. ELIGIBILITY AND ACCOUNT REGISTRATION</h5>
                <p class="lh-lg">
                    To use our services, you must be at least 18 years of age or have parental/guardian consent if you are a 
                    minor. When creating an account or using our services, you agree to:
                </p>
                <ul class="lh-lg">
                    <li>Provide accurate, current, and complete information about yourself</li>
                    <li>Maintain and promptly update your account information to keep it accurate</li>
                    <li>Maintain the security and confidentiality of your account credentials</li>
                    <li>Notify us immediately of any unauthorized access to your account</li>
                    <li>Accept responsibility for all activities conducted through your account</li>
                    <li>Comply with all applicable laws and regulations</li>
                </ul>
                <p class="lh-lg">
                    We reserve the right to suspend or terminate accounts that violate these Terms or engage in fraudulent, 
                    abusive, or illegal activities.
                </p>

                <h5 class="fw-bold">3. SERVICE FEES AND PAYMENT TERMS</h5>
                <p class="lh-lg">
                    Our service fees are clearly displayed during the checkout process and are separate from government 
                    processing fees. By completing a purchase, you authorize {{ $siteName ?? 'IVS' }} to charge your provided 
                    payment method for:
                </p>
                <ul class="lh-lg">
                    <li>Service fees for application preparation and assistance</li>
                    <li>Any applicable processing or payment platform fees</li>
                    <li>Additional services you may select during checkout</li>
                </ul>
                <p class="lh-lg">
                    All prices are quoted in U.S. Dollars (USD) unless otherwise specified. Payment is due at the time of 
                    service purchase. We accept major credit cards, debit cards, and other payment methods as displayed on 
                    our website. Government fees must be paid directly to the relevant authority according to their specific 
                    payment requirements.
                </p>
                <p class="lh-lg">
                    <strong>Government Fees:</strong> You acknowledge that government processing fees are non-refundable and 
                    are set by the respective government agencies, not by {{ $siteName ?? 'IVS' }}. These fees are subject 
                    to change without notice.
                </p>

                <h5 class="fw-bold">4. REFUND POLICY AND CANCELLATIONS</h5>
                <p class="lh-lg">
                    Our refund policy is detailed in our separate Refund Policy document. Please review it carefully. In summary:
                </p>
                <ul class="lh-lg">
                    <li>Refunds are available ONLY PRIOR to application submission to government authorities</li>
                    <li>Once you approve your completed forms for submission, refund eligibility ends</li>
                    <li>Government fees paid to authorities are non-refundable under any circumstances</li>
                    <li>Refund requests must be submitted via email with required documentation</li>
                    <li>Processing time for approved refunds is 1-7 business days</li>
                </ul>
                <p class="lh-lg">
                    If you become unresponsive to our requests for information for 90 days or more, resulting in application 
                    failure, you forfeit all refund eligibility and agree not to initiate chargebacks.
                </p>

                <h5 class="fw-bold">5. USER RESPONSIBILITIES AND CONDUCT</h5>
                <p class="lh-lg">
                    When using our services, you agree to:
                </p>
                <ul class="lh-lg">
                    <li>Provide truthful, accurate, and complete information on all forms and documents</li>
                    <li>Respond promptly to requests for additional information or clarification</li>
                    <li>Review all completed forms carefully before approving them for submission</li>
                    <li>Maintain copies of all documents and correspondence for your records</li>
                    <li>Notify us immediately of any errors or changes to your application</li>
                    <li>Comply with all government requirements and deadlines</li>
                    <li>Not misrepresent your identity, circumstances, or travel intentions</li>
                </ul>
                <p class="lh-lg">
                    You expressly agree NOT to:
                </p>
                <ul class="lh-lg">
                    <li>Use our services for any unlawful or fraudulent purpose</li>
                    <li>Provide false, misleading, or deceptive information</li>
                    <li>Violate any applicable laws, regulations, or third-party rights</li>
                    <li>Attempt to gain unauthorized access to our systems or user accounts</li>
                    <li>Transmit viruses, malware, or other harmful code</li>
                    <li>Interfere with or disrupt the operation of our services</li>
                    <li>Harvest or collect information about other users</li>
                    <li>Use automated systems (bots, scrapers) without written authorization</li>
                </ul>

                <h5 class="fw-bold">6. INTELLECTUAL PROPERTY RIGHTS</h5>
                <p class="lh-lg">
                    All content, features, and functionality on our website, including but not limited to text, graphics, 
                    logos, icons, images, audio clips, video clips, data compilations, and software, are the exclusive 
                    property of {{ $siteName ?? 'IVS' }} or our licensors and are protected by United States and 
                    international copyright, trademark, patent, trade secret, and other intellectual property laws.
                </p>
                <p class="lh-lg">
                    You may not reproduce, distribute, modify, create derivative works of, publicly display, publicly perform, 
                    republish, download, store, or transmit any material from our website without prior written consent from 
                    {{ $siteName ?? 'IVS' }}, except as permitted for personal, non-commercial use.
                </p>

                <h5 class="fw-bold">7. PRIVACY AND DATA PROTECTION</h5>
                <p class="lh-lg">
                    Your privacy is important to us. Our Privacy Policy explains how we collect, use, protect, and share 
                    your personal information. By using our services, you consent to our data practices as described in 
                    our Privacy Policy. We implement industry-standard security measures to protect your information, but 
                    no internet transmission is completely secure.
                </p>
                <p class="lh-lg">
                    You acknowledge that passport applications require sensitive personal information, including but not 
                    limited to your full name, date of birth, social security number, passport numbers, photographs, and 
                    supporting documents. You authorize {{ $siteName ?? 'IVS' }} to collect, process, and transmit this 
                    information to relevant government authorities as necessary to complete your application.
                </p>

                <h5 class="fw-bold">8. LIMITATIONS OF LIABILITY</h5>
                <p class="lh-lg">
                    TO THE FULLEST EXTENT PERMITTED BY APPLICABLE LAW, {{ $siteName ?? 'IVS' }}, ITS OFFICERS, DIRECTORS, 
                    EMPLOYEES, AGENTS, AND AFFILIATES SHALL NOT BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, 
                    OR PUNITIVE DAMAGES ARISING FROM OR RELATED TO YOUR USE OF OUR SERVICES, INCLUDING BUT NOT LIMITED TO:
                </p>
                <ul class="lh-lg">
                    <li>Loss of profits, revenue, data, or business opportunities</li>
                    <li>Travel delays, cancellations, or missed appointments</li>
                    <li>Application denials or rejections by government authorities</li>
                    <li>Processing delays caused by government backlogs</li>
                    <li>Errors or omissions in information you provided</li>
                    <li>Changes in government policies, fees, or requirements</li>
                    <li>Service interruptions or technical difficulties</li>
                </ul>
                <p class="lh-lg">
                    OUR TOTAL AGGREGATE LIABILITY FOR ALL CLAIMS ARISING FROM OR RELATED TO THESE TERMS OR OUR SERVICES SHALL 
                    NOT EXCEED THE AMOUNT YOU PAID TO {{ $siteName ?? 'IVS' }} FOR THE SPECIFIC SERVICE THAT GAVE RISE TO 
                    THE CLAIM.
                </p>
                <p class="lh-lg">
                    {{ $siteName ?? 'IVS' }} provides application assistance services but does not control government 
                    processing times, approval decisions, or appointment availability. We make no representations or warranties 
                    regarding the outcome of your application or the actions of government agencies.
                </p>

                <h5 class="fw-bold">9. DISCLAIMERS AND WARRANTIES</h5>
                <p class="lh-lg">
                    OUR SERVICES ARE PROVIDED ON AN "AS IS" AND "AS AVAILABLE" BASIS WITHOUT WARRANTIES OF ANY KIND, EITHER 
                    EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A 
                    PARTICULAR PURPOSE, NON-INFRINGEMENT, OR COURSE OF PERFORMANCE.
                </p>
                <p class="lh-lg">
                    {{ $siteName ?? 'IVS' }} DOES NOT WARRANT THAT:
                </p>
                <ul class="lh-lg">
                    <li>Our services will meet your specific requirements or expectations</li>
                    <li>Our services will be uninterrupted, timely, secure, or error-free</li>
                    <li>The results obtained from using our services will be accurate or reliable</li>
                    <li>Any errors in our services will be corrected</li>
                    <li>Your application will be approved by government authorities</li>
                    <li>Specific processing times or appointment dates can be guaranteed</li>
                </ul>

                <h5 class="fw-bold">10. INDEMNIFICATION</h5>
                <p class="lh-lg">
                    You agree to defend, indemnify, and hold harmless {{ $siteName ?? 'IVS' }}, its officers, directors, 
                    employees, agents, affiliates, and licensors from and against any claims, liabilities, damages, judgments, 
                    awards, losses, costs, expenses, or fees (including reasonable attorneys' fees) arising out of or relating to:
                </p>
                <ul class="lh-lg">
                    <li>Your violation of these Terms of Service</li>
                    <li>Your use or misuse of our services</li>
                    <li>Your violation of any law, regulation, or third-party right</li>
                    <li>Any misrepresentation or false information you provided</li>
                    <li>Your negligence or willful misconduct</li>
                </ul>

                <h5 class="fw-bold">11. DISPUTE RESOLUTION AND ARBITRATION</h5>
                <p class="lh-lg">
                    <strong>Informal Resolution:</strong> Before initiating formal proceedings, you agree to contact us at 
                    <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a> to attempt to resolve any dispute, claim, 
                    or controversy arising from or relating to these Terms or our services informally. We will make good faith 
                    efforts to resolve disputes amicably.
                </p>
                <p class="lh-lg">
                    <strong>Binding Arbitration:</strong> If we cannot resolve a dispute informally within 60 days, any 
                    remaining dispute shall be resolved through binding arbitration conducted by the American Arbitration 
                    Association (AAA) in accordance with its Commercial Arbitration Rules. The arbitration shall be conducted 
                    in English and shall take place in the state where {{ $siteName ?? 'IVS' }} maintains its principal 
                    place of business, unless otherwise agreed.
                </p>
                <p class="lh-lg">
                    <strong>Class Action Waiver:</strong> YOU AND {{ $siteName ?? 'IVS' }} AGREE THAT EACH PARTY MAY BRING 
                    CLAIMS AGAINST THE OTHER ONLY IN AN INDIVIDUAL CAPACITY AND NOT AS A PLAINTIFF OR CLASS MEMBER IN ANY 
                    PURPORTED CLASS OR REPRESENTATIVE ACTION OR PROCEEDING.
                </p>
                <p class="lh-lg">
                    <strong>Exceptions:</strong> Either party may seek equitable relief in court for infringement or other 
                    misuse of intellectual property rights, or to enforce arbitration provisions.
                </p>

                <h5 class="fw-bold">12. GOVERNING LAW AND JURISDICTION</h5>
                <p class="lh-lg">
                    These Terms shall be governed by and construed in accordance with the laws of the United States and the 
                    state in which {{ $siteName ?? 'IVS' }} maintains its principal place of business, without regard to 
                    conflict of law principles. Any legal action or proceeding not subject to arbitration shall be brought 
                    exclusively in the federal or state courts located in that jurisdiction, and you consent to the personal 
                    jurisdiction of such courts.
                </p>

                <h5 class="fw-bold">13. MODIFICATIONS TO TERMS</h5>
                <p class="lh-lg">
                    {{ $siteName ?? 'IVS' }} reserves the right to modify, update, or replace these Terms at any time at our 
                    sole discretion. Material changes will be notified through email or prominent notice on our website. Your 
                    continued use of our services following the posting of changes constitutes acceptance of those changes. 
                    We recommend reviewing these Terms periodically to stay informed of any updates.
                </p>

                <h5 class="fw-bold">14. TERMINATION</h5>
                <p class="lh-lg">
                    We may terminate or suspend your access to our services immediately, without prior notice or liability, 
                    for any reason, including but not limited to breach of these Terms. Upon termination, your right to use 
                    our services will immediately cease. All provisions of these Terms that by their nature should survive 
                    termination shall survive, including ownership provisions, warranty disclaimers, indemnity, and limitations 
                    of liability.
                </p>

                <h5 class="fw-bold">15. SEVERABILITY AND WAIVER</h5>
                <p class="lh-lg">
                    If any provision of these Terms is found to be unenforceable or invalid, that provision shall be limited 
                    or eliminated to the minimum extent necessary so that these Terms shall otherwise remain in full force and 
                    effect. Our failure to enforce any right or provision of these Terms shall not be deemed a waiver of such 
                    right or provision.
                </p>

                <h5 class="fw-bold">16. ENTIRE AGREEMENT</h5>
                <p class="lh-lg">
                    These Terms, together with our Privacy Policy, Refund Policy, and any other legal notices published on 
                    our website, constitute the entire agreement between you and {{ $siteName ?? 'IVS' }} concerning your 
                    use of our services and supersede all prior or contemporaneous communications and proposals, whether 
                    electronic, oral, or written.
                </p>

                <h5 class="fw-bold">17. CONTACT INFORMATION</h5>
                <p class="lh-lg">
                    If you have questions, concerns, or complaints about these Terms of Service, please contact us at:
                </p>
                <p class="lh-lg">
                    <strong>{{ $siteName ?? 'IVS' }}</strong><br>
                    Email: <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a><br>
                    Phone: <a href="tel:{{ $contactPhone }}">{{ $contactPhone }}</a><br>
                    Address: {{ $siteSettings['contact_address'] ?? '1234 Embassy Boulevard, Suite 500, Washington, DC 20005' }}
                </p>

                <h5 class="fw-bold">18. ACKNOWLEDGMENT</h5>
                <p class="lh-lg">
                    BY USING OUR SERVICES, YOU ACKNOWLEDGE THAT YOU HAVE READ THESE TERMS OF SERVICE, UNDERSTAND THEM, AND 
                    AGREE TO BE BOUND BY THEM. IF YOU DO NOT AGREE TO THESE TERMS, YOU MUST NOT ACCESS OR USE OUR SERVICES.
                </p>

                <p class="lh-lg mt-4"><em>Last Updated: October 13, 2025</em></p>
            </div>
        </div>
    </section>
@endsection
