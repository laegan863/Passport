@extends('main.app')
@section('content')
    <section id="privacy-policy" class="privacy-policy section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Refund Policy</h2>
            <p>Last Updated: October 13, 2025</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="content">
                <h4 class="fw-bold">Refund Policy Overview</h4>
                <p class="lh-lg">
                    Please review this policy carefully. This document outlines the refund policy for {{ $siteName ?? '' }}. 
                    We are committed to providing exceptional customer support and assistance throughout your passport application process. 
                    {{ $siteName ?? '' }} is dedicated to ensuring your satisfaction while helping you navigate the complexities of 
                    passport services with confidence. However, should you find yourself unsatisfied with our services for any reason, 
                    please contact us immediately at <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a> so we can address your 
                    concerns, issue a refund if applicable, or provide service credits for future use.
                </p>

                <h5 class="fw-bold">POLICY TERMS AND CONDITIONS</h5>
                <p class="lh-lg">
                    Our refund policy remains effective ONLY PRIOR to the submission of your travel document application to the relevant 
                    governmental authority. By purchasing services through this website, you acknowledge and accept these policy terms, 
                    along with our Terms of Use, Privacy Policy, Terms of Service, and all other applicable terms posted on our website. 
                    Once you review and approve the government forms prepared for submission, your approval constitutes a waiver of your 
                    refund eligibility from that point forward. Should a material error occur in your application due to our oversight, 
                    we will resubmit the corrected application at no additional charge; however, no refund will be issued.
                </p>

                <p class="lh-lg">
                    Refund requests PRIOR to application submission must be submitted via email to 
                    <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a>. Your email subject line must state: 
                    "Passport Application Refund Request". Your refund request email MUST include the following details:
                </p>

                <ul class="lh-lg">
                    <li>Applicant's Complete Legal Name</li>
                    <li>Invoice Number or Order Identification</li>
                    <li>Last four digits of the payment card used for purchase</li>
                    <li>Date of service purchase</li>
                    <li>Detailed explanation for refund request</li>
                </ul>

                <p class="lh-lg">
                    We will review and process your request within 24-48 business hours after receiving all required information. 
                    Approved refunds will be credited to the original payment method used at purchase and should appear in your account 
                    within 1-7 business days, depending on your financial institution's processing policies and billing cycle. If your 
                    refund has not appeared after 10 business days, please contact our Billing Department at 
                    <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a> for further assistance.
                </p>

                <h5 class="fw-bold">NON-REFUNDABLE CHARGES</h5>
                <p class="lh-lg">
                    Please note that this refund policy does not apply to government processing fees submitted to issuing authorities 
                    or other relevant governmental agencies. When you remit payment to a government agency, you are paying for official 
                    government services. Filing fees, biometric service charges, and other government-imposed costs are final and 
                    non-refundable, regardless of the outcome of your application, petition, or request, or if you choose to withdraw 
                    your submission. We cannot refund or credit payments made to third parties involved in processing your application 
                    (such as medical examiners, certified translators, notaries, etc.). Please review the FEE BREAKDOWN section below 
                    for comprehensive information.
                </p>

                <h5 class="fw-bold">CREDIT CARD CHARGEBACK POLICY</h5>
                <p class="lh-lg">
                    By engaging our services, you have agreed to abide by our service terms and refund policy. Initiating a credit card 
                    chargeback to obtain a refund outside of these established conditions constitutes a violation of these terms.
                </p>
                <p class="lh-lg">
                    If you become unresponsive to our support team's requests for additional information for 90 days or more from your 
                    service purchase date, resulting in application failure, you forfeit all refund eligibility and agree not to initiate 
                    a credit card chargeback.
                </p>
                <p class="lh-lg">
                    {{ $siteName ?? '' }} takes fraudulent chargebacks extremely seriously. We may report suspicious payment disputes 
                    to both payment processors and relevant U.S. Government agencies, along with supporting evidence. Chargeback fraud 
                    is a criminal offense that may result in being temporarily or permanently barred from entering your destination 
                    country, in addition to potential criminal prosecution and civil liability.
                </p>

                <h5 class="fw-bold">SERVICE ASSURANCE</h5>
                <p class="lh-lg">
                    If you have concerns about whether your application was submitted correctly, please contact us immediately at 
                    <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a>. If you submit a refund request following the 
                    requirements outlined in this policy, you can be confident that YOUR REFUND WILL BE PROCESSED. Please allow 
                    1-7 business days for the refund credit to appear in your account.
                </p>

                <h5 class="fw-bold">SATISFACTION GUARANTEE</h5>
                <p class="lh-lg">
                    Our satisfaction guarantee applies to issues directly caused by {{ $siteName ?? '' }} occurring PRIOR to your 
                    international travel. This guarantee supplements certain protections provided by applicable law. Please refer to 
                    our Terms of Service and Privacy Policy for additional details. All refund or credit requests under this guarantee 
                    must be submitted within 14 days of your service purchase.
                </p>
                <p class="lh-lg">
                    While we make every reasonable effort to secure the earliest available appointments, we cannot guarantee specific 
                    outcomes. Embassy and Consular appointment availability is entirely under the control of the respective Embassy or 
                    Consulate. Therefore, {{ $siteName ?? '' }} cannot modify or control appointment availability at any time.
                </p>

                <h5 class="fw-bold">EXCLUSIONS FROM SATISFACTION GUARANTEE</h5>
                <p class="lh-lg">
                    Please understand that we cannot guarantee the final outcome of your government filing. For example, government 
                    agencies may reject immigration or non-immigration petitions or applications for reasons beyond 
                    {{ $siteName ?? '' }}'s control or responsibility. Governmental processing backlogs may also result in 
                    significant delays before your application is finalized.
                </p>
                <p class="lh-lg">
                    This guarantee does not cover changes to your personal circumstances or decisions. It does not apply if entry is 
                    denied by Border Protection Officers or due to epidemic/pandemic-related restrictions. This guarantee becomes void 
                    if you have made misrepresentations on an application, provided misleading information during our service delivery, 
                    previously requested a refund, or initiated a chargeback with your bank.
                </p>

                <h5 class="fw-bold">IMPORTANT DISCLAIMER</h5>
                <p class="lh-lg">
                    By using our services, you acknowledge that {{ $siteName ?? '' }} operates as a private, internet-based travel 
                    technology service provider. We are dedicated to assisting individuals with international travel documentation. 
                    This website is not a legal practice and cannot substitute for advice from qualified legal professionals. This 
                    website maintains no affiliation with or endorsement from any U.S. government agency or foreign governmental entity.
                </p>
                <p class="lh-lg">
                    <strong>IMPORTANT NOTE:</strong> Blank passport application forms with completion instructions are available free 
                    of charge on official government websites. Our service fee covers professional application preparation assistance, 
                    document review, compliance verification, and application submission support—not the forms themselves.
                </p>

                <h5 class="fw-bold">FEE BREAKDOWN - INFORMATIONAL PURPOSES</h5>

                <p class="lh-lg"><strong>Travel Document Costs</strong><br>
                    The total cost for obtaining a travel document consists of two separate components: our service fee for application 
                    preparation and assistance, and government-mandated fees paid directly to the issuing authority. Government fees 
                    vary based on document type, processing speed, and applicant age or status.
                </p>

                <p class="lh-lg"><strong>Accepted Payment Methods</strong><br>
                    {{ $siteName ?? '' }} accepts the following payment methods for our service fees:
                </p>

                <ul class="lh-lg">
                    <li>Major credit cards (Visa, MasterCard, American Express, Discover)</li>
                    <li>Debit cards with credit card processing capability</li>
                    <li>PayPal and other authorized digital payment platforms</li>
                    <li>Bank transfers for certain international clients (contact us for availability)</li>
                </ul>

                <p class="lh-lg">
                    All payments are processed through secure, encrypted payment gateways that comply with PCI-DSS standards to 
                    protect your financial information. We do not store complete credit card information on our servers.
                </p>

                <p class="lh-lg">
                    Government fees must be paid according to the specific requirements of the issuing authority, which may include 
                    money orders, cashier's checks, or online payment through government portals. We will provide detailed payment 
                    instructions specific to your application type.
                </p>

                <p class="lh-lg"><em>Professional Recommendation:</em> We strongly advise using credit cards for purchases whenever 
                possible, as they offer additional consumer protections and fraud prevention measures.</p>

                <p class="lh-lg">For additional information or questions, please contact us at 
                    <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a> or call 
                    <a href="tel:{{ $contactPhone }}">{{ $contactPhone }}</a>.</p>

                <p class="lh-lg"><strong>Application Preparation Service Fees</strong><br>
                    Our service fees cover comprehensive application preparation, including form completion assistance, document review, 
                    compliance verification, photo specification checking, and submission support. These fees are separate from and do 
                    not include any government charges, medical examination costs, or third-party service fees.
                </p>

                <p class="lh-lg"><strong>Payment Processing Fees</strong><br>
                    Credit card processing fees may apply to transactions and will be clearly disclosed during checkout. These fees 
                    cover the costs of secure payment processing and fraud protection measures implemented to safeguard your financial 
                    information.
                </p>

            </div>
        </div>
    </section>
@endsection
