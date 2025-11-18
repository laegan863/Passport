@extends('main.app')
@section('content')
    <section id="privacy-policy" class="privacy-policy section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Terms of Use</h2>
            <p>Last Updated: October 13, 2025</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="content">
                <p class="lh-lg">
                    You acknowledge and agree that {{ $siteName ?? 'IVS' }} is not a legal practice or attorney service and does not 
                    provide legal representation. Our forms and templates are not substitutes for professional legal advice. You are 
                    self-representing in this matter. Using {{ $siteName ?? 'IVS' }} or accessing our website does not create an 
                    attorney-client relationship or privilege. Your access to and use of this website signifies your agreement with 
                    and understanding of our Disclaimers, Privacy Policy, and Refund Policy.
                </p>

                <p class="lh-lg">
                    You understand that these Terms of Use include a binding arbitration clause requiring individual dispute 
                    resolution through arbitration rather than jury trials or class action proceedings, which limits the remedies 
                    available to you should a dispute arise.
                </p>

                <p class="lh-lg">
                    You consent to receive electronic communications from {{ $siteName ?? 'IVS' }} as an integral part of our services. 
                    We may establish a dedicated email address for your account to facilitate communication with government agencies 
                    processing your travel documentation. Should you wish to discontinue email communications or request that we stop 
                    using your assigned email address, please notify us immediately at 
                    <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a>.
                </p>

                <p class="lh-lg">
                    You understand that {{ $siteName ?? 'IVS' }}'s review of your information is limited to verifying completeness, 
                    spelling accuracy, and internal consistency of names, addresses, and similar details. You are responsible for 
                    thoroughly reviewing all final applications before submission and accept full responsibility for the accuracy 
                    and content of all submitted documentation.
                </p>

                <h5 class="fw-bold">Information Accuracy and Third-Party Authorization</h5>
                <p class="lh-lg">
                    By accepting these terms, you certify that all information provided to {{ $siteName ?? 'IVS' }} is accurate and 
                    truthful to the best of your knowledge. You also consent to our third-party processing authorizations, which 
                    may involve the use of your personal data and digital signatures as necessary to complete your application.
                </p>

                <h5 class="fw-bold">Electronic Documentation and Digital Signatures</h5>
                <p class="lh-lg">
                    You authorize {{ $siteName ?? 'IVS' }} to affix your electronic signature where required and to submit all 
                    mandatory documents for the services you have purchased. You retain the right to withdraw this consent at any 
                    time by contacting us at <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a>. Withdrawing consent 
                    will result in immediate discontinuation of our services for your application.
                </p>

                <h5 class="fw-bold">Non-English Speaking Clients</h5>
                <p class="lh-lg">
                    You acknowledge that certain materials on {{ $siteName ?? 'IVS' }}, including questionnaires, official documents, 
                    instructions, and filings, are available exclusively in English. Any non-English translations of these Terms or 
                    other policies are provided solely for convenience. In the event of discrepancies or ambiguities between 
                    translations, the English version shall be authoritative and controlling.
                </p>

                <h5 class="fw-bold">Liability Limitations and Indemnification</h5>
                <p class="lh-lg">
                    To the maximum extent permitted by law, you agree to hold {{ $siteName ?? 'IVS' }} and its officers, directors, 
                    employees, and agents harmless from any indirect, punitive, special, incidental, or consequential damages, 
                    regardless of how they arise (including legal fees and all related litigation or arbitration costs, whether at 
                    trial or on appeal), whether in contract, negligence, or other tort actions, arising from or related to these 
                    terms, including any claims for personal injury or property damage. This includes violations of federal, state, 
                    or local laws, statutes, rules, or regulations, even if {{ $siteName ?? 'IVS' }} has been previously notified 
                    of potential damages. To the extent permitted by law, if liability is found against {{ $siteName ?? 'IVS' }}, 
                    it shall be limited to the amount paid for services, with no consequential or punitive damages under any 
                    circumstances. Some jurisdictions do not allow such exclusions, so these limitations may not apply to you.
                </p>

                <h5 class="fw-bold">Third-Party Services</h5>
                <p class="lh-lg">
                    If your purchased services involve third-party providers, you may be required to accept additional terms on 
                    their respective websites. Third parties may contact you via email or telephone with benefit access instructions. 
                    {{ $siteName ?? 'IVS' }} disclaims liability for any information, materials, products, or services provided by 
                    third parties. {{ $siteName ?? 'IVS' }} is not responsible for the performance of products or services offered 
                    on external websites. Third-party companies maintain their own privacy policies and may implement different 
                    security measures than {{ $siteName ?? 'IVS' }}.
                </p>

                <h5 class="fw-bold">Additional Products and Services</h5>
                <p class="lh-lg">
                    If you elect to add products or services to your order after the initial purchase, these Terms of Use will 
                    apply equally to all subsequent purchases.
                </p>

                <h5 class="fw-bold">Refund Policy</h5>
                <p class="lh-lg">
                    You acknowledge that {{ $siteName ?? 'IVS' }} maintains a comprehensive Refund Policy incorporated into these 
                    Terms of Use. The complete terms of our Refund Policy are available at 
                    <a href="{{ route('page.refund-policy') }}">{{ url('/') }}/refund-policy</a>. We encourage you to review 
                    this policy carefully before purchasing our services.
                </p>

                <h5 class="fw-bold">Governing Law</h5>
                <p class="lh-lg">
                    These Terms of Use and your use of this website shall be governed by and interpreted according to the laws 
                    of the United States, for both substantive and procedural matters, without regard to any choice of law or 
                    conflict of law provisions that would cause the application of laws from any other jurisdiction.
                </p>

                <h5 class="fw-bold">Time Limitations for Claims</h5>
                <p class="lh-lg">
                    Any legal claim or cause of action you may have concerning this website (including but not limited to product 
                    or service purchases) must be initiated within one (1) year from the date the claim or cause of action arises.
                </p>

                <h5 class="fw-bold">Arbitration and Legal Venue</h5>
                <p class="lh-lg">
                    Any dispute arising from your website visit shall be submitted to confidential arbitration in the United States. 
                    However, if you have violated or threatened to violate our intellectual property rights, we may seek injunctive 
                    or other appropriate relief in any state or federal court, and you consent to exclusive jurisdiction and venue 
                    in such courts. Arbitration under these Terms shall proceed according to the American Arbitration Association's 
                    Commercial Arbitration Rules before a single qualified arbitrator with expertise in the subject matter of the 
                    dispute.
                </p>

                <p class="lh-lg">
                    The arbitrator's decision shall be final and binding. The arbitrator may award declaratory or injunctive relief 
                    only to the individual party seeking relief and only to the extent necessary to provide relief warranted by that 
                    party's claim. Any court with jurisdiction may enter judgment on the arbitrator's award.
                </p>

                <h5 class="fw-bold">Binding Arbitration</h5>
                <p class="lh-lg">
                    Both parties agree that arbitration shall be the exclusive means of resolving disputes arising from these Terms 
                    or your use of our services. The arbitrator's decision is final and enforceable in any court with proper 
                    jurisdiction.
                </p>

                <h5 class="fw-bold">Class Action Waiver</h5>
                <p class="lh-lg">
                    You agree that any arbitration or legal proceeding shall be conducted solely on an individual basis and not as 
                    a class action, consolidated action, or representative action. You expressly waive any right to pursue claims 
                    on a class basis or to participate in a class action against {{ $siteName ?? 'IVS' }}. This waiver applies to 
                    all claims under these Terms of Use.
                </p>

                <h5 class="fw-bold">Account Suspension</h5>
                <p class="lh-lg">
                    {{ $siteName ?? 'IVS' }} reserves the right to suspend or terminate your account at any time if we determine, 
                    in our sole discretion, that you have violated these Terms of Use, engaged in fraudulent activity, or provided 
                    false information. Upon suspension or termination, your access to services will cease immediately.
                </p>

                <h5 class="fw-bold">Filing Fees</h5>
                <p class="lh-lg">
                    {{ $siteName ?? 'IVS' }} will pay all arbitration filing fees for claims less than $10,000, unless the 
                    arbitrator determines that your claims are frivolous. You are responsible for your own attorney fees unless 
                    applicable law provides otherwise.
                </p>

                <h5 class="fw-bold">Customer Reviews</h5>
                <p class="lh-lg">
                    You may submit reviews of our services. By submitting a review, you grant {{ $siteName ?? 'IVS' }} a perpetual, 
                    royalty-free, worldwide license to use, reproduce, and display your review for marketing and promotional purposes. 
                    Reviews must be truthful and based on your actual experience.
                </p>

                <h5 class="fw-bold">Force Majeure</h5>
                <p class="lh-lg">
                    {{ $siteName ?? 'IVS' }} shall not be held liable for any failure or delay in performance resulting from 
                    circumstances beyond our reasonable control, including but not limited to acts of God, war, terrorism, riots, 
                    embargoes, acts of civil or military authorities, fire, floods, accidents, pandemics, strikes, or shortages of 
                    transportation, facilities, fuel, energy, labor, or materials.
                </p>

                <h5 class="fw-bold">Right to Refuse Service</h5>
                <p class="lh-lg">
                    {{ $siteName ?? 'IVS' }} reserves the right to refuse service to anyone for any reason at any time, subject to 
                    applicable law.
                </p>

                <p class="lh-lg">
                    For questions regarding these Terms of Use, please contact us at 
                    <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a> or call 
                    <a href="tel:{{ $contactPhone }}">{{ $contactPhone }}</a>. Our office is located at 
                    {{ $siteSettings['contact_address'] ?? '1234 Embassy Boulevard, Suite 500' }}, 
                    {{ $siteSettings['contact_city'] ?? 'Washington' }}, {{ $siteSettings['contact_state'] ?? 'DC' }} 
                    {{ $siteSettings['contact_zip'] ?? '20001' }}.
                </p>

            </div>
        </div>
    </section>
@endsection
