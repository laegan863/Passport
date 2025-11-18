@extends('main.app')
@section('content')
    <section id="privacy-policy" class="privacy-policy section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Legal Disclaimer</h2>
            <p>Last Updated: October 13, 2025</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="content">
                <h4 class="fw-bold">Important Legal Notice</h4>

                <p class="lh-lg">
                    {{ $siteName ?? 'IVS' }} operates as an independent service provider and maintains no affiliation with the United States Department of State (DOS), 
                    United States Department of Homeland Security (DHS), United States Citizenship and Immigration Services (USCIS), 
                    or any federal, state, or foreign governmental entity.
                </p>

                <p class="lh-lg">
                    {{ $siteName ?? 'IVS' }} is not a legal practice and does not offer legal counsel. Our services are not intended to replace 
                    professional legal advice from a qualified attorney. The acquisition of our services does not establish an attorney-client 
                    relationship between you and {{ $siteName ?? 'IVS' }}. Depending on your particular circumstances, you may require consultation 
                    with a licensed legal professional, and {{ $siteName ?? 'IVS' }} cannot serve as a replacement for such professional guidance.
                </p>

                <p class="lh-lg">
                    Travel document requirements and policies are established by the issuing governmental authority. These requirements 
                    govern the criteria that foreign nationals must satisfy to obtain travel authorization, which serves as permission 
                    to enter, visit, and remain in the destination country.
                </p>

                <p class="lh-lg">
                    All information you provide, whether directly or through an authorized representative, must be accurate and truthful. 
                    Travel authorizations may be revoked by the issuing authority at any time and for various reasons, including the 
                    discovery of new information affecting eligibility. Knowingly submitting false, misleading, or fraudulent information 
                    in a travel document application may result in serious administrative penalties or criminal charges.
                </p>

                <p class="lh-lg">
                    The service fees displayed for application preparation and assistance do NOT include government application fees, 
                    medical examination costs, filing charges, or biometric service fees. All government-imposed fees are non-refundable 
                    once submitted. Please refer to our <a href="{{ route('page.refund-policy') }}">Refund Policy</a> for complete details.
                </p>

                <p class="lh-lg">
                    Client testimonials and reviews published on this website reflect individual experiences with our services. These 
                    reviews should not be interpreted as guarantees of specific outcomes for your application. The information presented 
                    on this website serves general informational purposes only and should not be construed as a promise of particular 
                    results. Application outcomes depend on numerous factors, including your unique circumstances, documentation quality, 
                    governmental processing procedures, and various elements beyond anyone's control.
                </p>

                <p class="lh-lg">
                    This website contains general information regarding immigration and non-immigration matters. Such content is provided 
                    for informational purposes exclusively and may not reflect the most current legal developments or procedural changes. 
                    This information should not be interpreted as legal counsel regarding any specific situation or set of circumstances. 
                    We strongly recommend consulting with a qualified attorney for guidance on your particular legal matters.
                </p>

                <p class="lh-lg">
                    While {{ $siteName ?? 'IVS' }} strives to maintain accurate and current website information, we make no guarantees or 
                    warranties, either expressed or implied, concerning the completeness, accuracy, reliability, appropriateness, or 
                    availability of the website content, products, services, or associated materials. Any reliance you place on website 
                    information is undertaken entirely at your own discretion and risk.
                </p>

                <p class="lh-lg">
                    Although we make reasonable efforts to ensure continuous website operation, {{ $siteName ?? 'IVS' }} accepts no 
                    responsibility for temporary unavailability resulting from technical difficulties, internet infrastructure issues, 
                    or circumstances beyond our reasonable control. We shall not be held liable for any losses or damages arising from 
                    website access issues or service interruptions.
                </p>

                <p class="lh-lg">
                    Certain hyperlinks on this website direct users to external websites not controlled by {{ $siteName ?? 'IVS' }}. 
                    When you navigate to these external sites, you leave our platform. {{ $siteName ?? 'IVS' }} exercises no control 
                    over and assumes no liability for the content, materials, products, or services available on third-party websites.
                </p>

                <p class="lh-lg">
                    To the maximum extent permitted by applicable law, {{ $siteName ?? 'IVS' }} shall not be liable to you or any third 
                    parties for any losses or damages (including but not limited to business interruption, profit loss, or consequential 
                    damages) arising directly or indirectly from your use of, or inability to use, this website or any materials contained 
                    within it.
                </p>

                <p class="lh-lg">
                    The application forms utilized through our service are available as blank templates free of charge on various 
                    governmental websites. {{ $siteName ?? 'IVS' }} operates as a private technology-based service provider dedicated 
                    to simplifying international travel documentation processes for individuals worldwide.
                </p>

                <p class="lh-lg">
                    By accessing and utilizing this website, you acknowledge your understanding and acceptance of the terms outlined 
                    in this disclaimer and all other legal documentation published on this platform. If you have questions or concerns, 
                    please contact us at <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a> or call 
                    <a href="tel:{{ $contactPhone }}">{{ $contactPhone }}</a>.
                </p>

            </div>
        </div>
    </section>
@endsection
