@extends('main.app')
@section('content')
    <!-- Privacy Policy Section -->
    <section id="privacy-policy" class="privacy-policy section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Privacy Policy</h2>
            <p>Last Updated: October 13, 2025</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="content">
                <h4 class="fw-bold">Introduction</h4>
                <p class="lh-lg">
                    This Privacy Policy explains how {{ $siteName ?? 'IVS' }} ("{{ $siteName ?? 'IVS' }}", "we," "us," or "our") 
                    collects, uses, protects, and discloses your personal information when you access our website, use our services, 
                    or interact with us through phone calls, video consultations, or other communication channels. This policy applies 
                    to all users of our passport application assistance services and describes your privacy rights and how the law 
                    protects you.
                </p>
                <p class="lh-lg">
                    By using our services, you consent to the collection and use of information in accordance with this Privacy Policy. 
                    We are committed to protecting your privacy and handling your personal information responsibly. This policy includes 
                    specific information for California residents under the California Consumer Privacy Act (CCPA) and individuals in 
                    the European Union under the General Data Protection Regulation (GDPR).
                </p>

                <h5 class="fw-bold">Key Definitions</h5>
                
                <p class="lh-lg"><strong>Personal Data:</strong><br>
                    Any information relating to an identified or identifiable natural person ("data subject"). An identifiable person 
                    is one who can be identified, directly or indirectly, particularly by reference to an identifier such as a name, 
                    identification number, location data, online identifier, or one or more factors specific to their physical, 
                    physiological, genetic, mental, economic, cultural, or social identity.
                </p>

                <p class="lh-lg"><strong>Data Subject/User:</strong><br>
                    Refers to any identified or identifiable natural person whose personal data is processed by {{ $siteName ?? 'IVS' }} 
                    as the data controller responsible for such processing.
                </p>

                <p class="lh-lg"><strong>Processing:</strong><br>
                    Any operation or set of operations performed on personal data or sets of personal data, whether by automated means, 
                    including collection, recording, organization, structuring, storage, adaptation, alteration, retrieval, consultation, 
                    use, disclosure by transmission, dissemination or making available, alignment, combination, restriction, erasure, or 
                    destruction.
                </p>

                <p class="lh-lg"><strong>Consent:</strong><br>
                    Any freely given, specific, informed, and unambiguous indication of the data subject's wishes by which they, through 
                    a statement or clear affirmative action, signify agreement to the processing of personal data relating to them.
                </p>

                <p class="lh-lg"><strong>Data Controller:</strong><br>
                    {{ $siteName ?? 'IVS' }} acts as the data controller, determining the purposes and means of processing your personal data.
                </p>

                <h5 class="fw-bold">1. INFORMATION WE COLLECT</h5>

                <p class="lh-lg">
                    We or our authorized service providers collect various types of personal and non-personal information when you use 
                    our website or services. The specific information collected depends on the nature of your interaction with us (such 
                    as browsing our website, requesting services, or completing applications), the types of passport services you consider 
                    or purchase, and what information you choose to share with us. This section outlines all categories of information we 
                    may potentially collect, though we will rarely collect every type of information about any single individual.
                </p>

                <p class="lh-lg"><strong>A. Identifiers and Contact Information</strong><br>
                    This category includes information that identifies you or can be used to contact you, such as:
                </p>
                <ul class="lh-lg">
                    <li>Full legal name, nicknames, and aliases</li>
                    <li>Residential and mailing addresses</li>
                    <li>Email addresses (personal and business)</li>
                    <li>Telephone numbers (mobile, home, work)</li>
                    <li>Social Security Number (SSN)</li>
                    <li>Driver's license or state identification numbers</li>
                    <li>Passport numbers and travel document identifiers</li>
                    <li>Other government-issued identification numbers</li>
                    <li>Account usernames and online identifiers</li>
                    <li>Internet Protocol (IP) addresses</li>
                    <li>Device identifiers and unique user IDs</li>
                </ul>

                <p class="lh-lg"><strong>B. Demographic and Personal Characteristics</strong><br>
                    Information about your personal characteristics and demographics, including:
                </p>
                <ul class="lh-lg">
                    <li>Date of birth and age</li>
                    <li>Gender and sex</li>
                    <li>National origin, citizenship, and nationality</li>
                    <li>Marital and family status</li>
                    <li>Physical characteristics and descriptions (height, weight, eye color, hair color)</li>
                    <li>Photographs and biometric data (as required for passport applications)</li>
                    <li>Sexual orientation (only if voluntarily provided)</li>
                    <li>Veteran or military service status</li>
                    <li>Disability status (only if relevant to travel requirements)</li>
                </ul>

                <p class="lh-lg"><strong>C. Financial and Payment Information</strong><br>
                    Financial details necessary for processing payments and verifying identity:
                </p>
                <ul class="lh-lg">
                    <li>Credit card, debit card, and payment card numbers (securely processed through third-party payment processors)</li>
                    <li>Bank account information (when required for certain payment methods)</li>
                    <li>Billing addresses and payment history</li>
                    <li>Transaction records and purchase history</li>
                    <li>Tax identification numbers (when required)</li>
                </ul>

                <p class="lh-lg"><strong>D. Professional and Employment Information</strong><br>
                    Information about your professional status and employment, including:
                </p>
                <ul class="lh-lg">
                    <li>Current and previous employment history</li>
                    <li>Employer names, addresses, and contact information</li>
                    <li>Job titles, positions, and responsibilities</li>
                    <li>Professional licenses and certifications</li>
                    <li>Educational background and qualifications</li>
                    <li>Professional affiliations and memberships</li>
                    <li>Income and salary information (when relevant to application requirements)</li>
                </ul>

                <p class="lh-lg"><strong>E. Travel and Immigration History</strong><br>
                    Information related to your travel plans and immigration history:
                </p>
                <ul class="lh-lg">
                    <li>Previous passport and visa information</li>
                    <li>Travel history and countries visited</li>
                    <li>Planned travel dates and destinations</li>
                    <li>Purpose of travel (business, tourism, family visits, etc.)</li>
                    <li>Immigration application history</li>
                    <li>Entry and exit records</li>
                    <li>Previous application denials or issues</li>
                </ul>

                <p class="lh-lg"><strong>F. Internet and Electronic Activity</strong><br>
                    Information about your online behavior and interactions with our digital platforms:
                </p>
                <ul class="lh-lg">
                    <li>Browsing history and pages viewed on our website</li>
                    <li>Search history and queries entered</li>
                    <li>Click patterns and navigation paths</li>
                    <li>Time spent on pages and session duration</li>
                    <li>Device information (type, model, operating system, browser type and version)</li>
                    <li>Browser settings and preferences</li>
                    <li>Referring and exit pages</li>
                    <li>Interaction with emails we send (open rates, click-through rates)</li>
                    <li>Interaction with advertisements and promotional materials</li>
                    <li>Cookies and similar tracking technologies data</li>
                </ul>

                <p class="lh-lg"><strong>G. Geolocation Information</strong><br>
                    Information about your physical location, collected through:
                </p>
                <ul class="lh-lg">
                    <li>GPS and Wi-Fi signals from your mobile device (when permissions are granted)</li>
                    <li>IP address geolocation</li>
                    <li>Postal address and zip code</li>
                    <li>Country and regional information</li>
                </ul>

                <p class="lh-lg"><strong>H. Audio, Visual, and Electronic Information</strong><br>
                    Recordings and visual data collected during interactions:
                </p>
                <ul class="lh-lg">
                    <li>Audio recordings of customer service calls and consultations</li>
                    <li>Video recordings from remote consultations or appointments</li>
                    <li>Photographs submitted as part of passport applications</li>
                    <li>Security camera footage (when visiting our physical locations)</li>
                    <li>Screen recordings for technical support purposes (with consent)</li>
                </ul>

                <p class="lh-lg"><strong>I. User-Generated Content</strong><br>
                    Information you voluntarily provide to us:
                </p>
                <ul class="lh-lg">
                    <li>Responses to questionnaires and application forms</li>
                    <li>Survey responses and feedback</li>
                    <li>Customer service inquiries and support tickets</li>
                    <li>Reviews, testimonials, and ratings</li>
                    <li>Communications sent to us via email, chat, or phone</li>
                    <li>Documents uploaded for application processing</li>
                </ul>

                <p class="lh-lg"><strong>J. Sensitive Personal Information</strong><br>
                    In limited circumstances required for passport applications, we may collect sensitive information such as:
                </p>
                <ul class="lh-lg">
                    <li>Medical information (only when specifically required by government authorities)</li>
                    <li>Criminal history (when disclosure is required for certain travel documents)</li>
                    <li>Biometric data (facial recognition data from passport photos)</li>
                </ul>
                <p class="lh-lg">
                    We collect sensitive information only when necessary for the specific service you request and with your explicit consent.
                </p>

                <h5 class="fw-bold">2. HOW WE COLLECT INFORMATION</h5>

                <p class="lh-lg">We collect information through various methods:</p>

                <p class="lh-lg"><strong>A. Information You Provide Directly</strong></p>
                <ul class="lh-lg">
                    <li>When you create an account on our website</li>
                    <li>When you complete application forms and questionnaires</li>
                    <li>When you contact us for customer support</li>
                    <li>When you participate in surveys or provide feedback</li>
                    <li>When you subscribe to our newsletters or promotional communications</li>
                    <li>When you upload documents for application processing</li>
                    <li>When you make payments for our services</li>
                </ul>

                <p class="lh-lg"><strong>B. Information Collected Automatically</strong></p>
                <ul class="lh-lg">
                    <li>Through cookies and similar tracking technologies when you visit our website</li>
                    <li>Through web beacons and pixels in our emails</li>
                    <li>Through analytics tools that track user behavior and website performance</li>
                    <li>Through server logs that record technical information about your visit</li>
                </ul>

                <p class="lh-lg"><strong>C. Information from Third-Party Sources</strong></p>
                <ul class="lh-lg">
                    <li>Identity verification services</li>
                    <li>Payment processors and financial institutions</li>
                    <li>Data analytics providers</li>
                    <li>Marketing and advertising partners</li>
                    <li>Social media platforms (if you connect your accounts)</li>
                    <li>Public databases and government records (for verification purposes)</li>
                </ul>

                <h5 class="fw-bold">3. HOW WE USE YOUR INFORMATION</h5>

                <p class="lh-lg">{{ $siteName ?? 'IVS' }} uses the collected information for the following purposes:</p>

                <p class="lh-lg"><strong>A. Service Delivery and Application Processing</strong></p>
                <ul class="lh-lg">
                    <li>To process and prepare your passport applications</li>
                    <li>To verify your identity and eligibility</li>
                    <li>To communicate with you about your application status</li>
                    <li>To provide customer support and respond to your inquiries</li>
                    <li>To schedule appointments and consultations</li>
                    <li>To submit applications to relevant government authorities</li>
                    <li>To track application progress and provide updates</li>
                </ul>

                <p class="lh-lg"><strong>B. Payment Processing and Financial Transactions</strong></p>
                <ul class="lh-lg">
                    <li>To process payments for our services</li>
                    <li>To prevent fraud and unauthorized transactions</li>
                    <li>To issue receipts and maintain financial records</li>
                    <li>To process refunds when applicable</li>
                </ul>

                <p class="lh-lg"><strong>C. Communication and Marketing</strong></p>
                <ul class="lh-lg">
                    <li>To send you service-related communications and updates</li>
                    <li>To provide customer support and respond to inquiries</li>
                    <li>To send newsletters and promotional materials (with your consent)</li>
                    <li>To inform you about new services, features, or special offers</li>
                    <li>To conduct surveys and gather feedback</li>
                </ul>

                <p class="lh-lg"><strong>D. Website Improvement and Analytics</strong></p>
                <ul class="lh-lg">
                    <li>To understand how users interact with our website</li>
                    <li>To improve website functionality, design, and user experience</li>
                    <li>To conduct data analysis and research</li>
                    <li>To test new features and services</li>
                    <li>To optimize our marketing campaigns</li>
                </ul>

                <p class="lh-lg"><strong>E. Legal Compliance and Security</strong></p>
                <ul class="lh-lg">
                    <li>To comply with applicable laws, regulations, and legal processes</li>
                    <li>To respond to government requests and court orders</li>
                    <li>To protect our rights, property, and safety</li>
                    <li>To prevent fraud, abuse, and illegal activities</li>
                    <li>To enforce our Terms of Service and other policies</li>
                    <li>To maintain security and prevent unauthorized access</li>
                </ul>

                <p class="lh-lg"><strong>F. Business Operations</strong></p>
                <ul class="lh-lg">
                    <li>To maintain records and documentation</li>
                    <li>To conduct internal audits and quality assurance</li>
                    <li>To train our staff and improve service quality</li>
                    <li>To analyze business performance and trends</li>
                    <li>To facilitate business transactions (mergers, acquisitions, or asset sales)</li>
                </ul>

                <h5 class="fw-bold">4. HOW WE SHARE YOUR INFORMATION</h5>

                <p class="lh-lg">{{ $siteName ?? 'IVS' }} may share your personal information with the following categories of recipients:</p>

                <p class="lh-lg"><strong>A. Government Authorities</strong></p>
                <ul class="lh-lg">
                    <li>U.S. Department of State and passport agencies for application processing</li>
                    <li>Other relevant government agencies as required for travel document processing</li>
                    <li>Law enforcement agencies when required by law or legal process</li>
                </ul>

                <p class="lh-lg"><strong>B. Service Providers and Business Partners</strong></p>
                <ul class="lh-lg">
                    <li>Payment processors for secure transaction handling</li>
                    <li>Shipping and courier services for document delivery</li>
                    <li>Photography services for passport photo processing</li>
                    <li>Identity verification services</li>
                    <li>Cloud storage and hosting providers</li>
                    <li>Email and communication service providers</li>
                    <li>Customer support and call center services</li>
                    <li>Analytics and data analysis providers</li>
                    <li>Marketing and advertising partners</li>
                </ul>
                <p class="lh-lg">
                    These service providers are contractually obligated to protect your information and use it only for the specific 
                    purposes for which it was disclosed.
                </p>

                <p class="lh-lg"><strong>C. Legal and Regulatory Requirements</strong></p>
                <ul class="lh-lg">
                    <li>When required to comply with legal obligations, court orders, or subpoenas</li>
                    <li>To respond to lawful requests from public authorities</li>
                    <li>To protect our rights, privacy, safety, or property</li>
                    <li>To prevent fraud or criminal activity</li>
                    <li>To enforce our legal rights and remedies</li>
                </ul>

                <p class="lh-lg"><strong>D. Business Transfers</strong></p>
                <p class="lh-lg">
                    In the event of a merger, acquisition, reorganization, bankruptcy, or sale of assets, your personal information 
                    may be transferred to the successor entity. We will notify you of such changes and provide you with choices 
                    regarding your information.
                </p>

                <p class="lh-lg"><strong>E. With Your Consent</strong></p>
                <p class="lh-lg">
                    We may share your information with other parties when you have given us explicit consent to do so.
                </p>

                <h5 class="fw-bold">5. DATA SECURITY MEASURES</h5>

                <p class="lh-lg">
                    {{ $siteName ?? 'IVS' }} takes the security of your personal information seriously. We implement appropriate 
                    technical and organizational measures to protect your data against unauthorized access, alteration, disclosure, 
                    or destruction. Our security measures include:
                </p>

                <ul class="lh-lg">
                    <li>SSL/TLS encryption for data transmission</li>
                    <li>Encryption of sensitive data at rest</li>
                    <li>Secure data centers with physical access controls</li>
                    <li>Regular security audits and vulnerability assessments</li>
                    <li>Access controls and authentication mechanisms</li>
                    <li>Employee training on data protection and privacy</li>
                    <li>Incident response and breach notification procedures</li>
                    <li>Regular backup and disaster recovery procedures</li>
                </ul>

                <p class="lh-lg">
                    While we strive to protect your personal information, no method of transmission over the internet or electronic 
                    storage is 100% secure. We cannot guarantee absolute security, but we continuously work to improve our security 
                    practices and promptly address any identified vulnerabilities.
                </p>

                <h5 class="fw-bold">6. DATA RETENTION</h5>

                <p class="lh-lg">
                    We retain your personal information for as long as necessary to fulfill the purposes outlined in this Privacy Policy, 
                    unless a longer retention period is required or permitted by law. Specific retention periods vary depending on:
                </p>

                <ul class="lh-lg">
                    <li>The nature of the information and why we collected it</li>
                    <li>Legal, regulatory, tax, or accounting requirements</li>
                    <li>Our legitimate business interests</li>
                    <li>Potential legal claims or disputes</li>
                </ul>

                <p class="lh-lg">
                    Generally, we retain application records and related documents for at least 7 years to comply with legal requirements 
                    and for potential audit purposes. After the retention period expires, we securely delete or anonymize your personal 
                    information in accordance with our data retention policy.
                </p>

                <h5 class="fw-bold">7. YOUR PRIVACY RIGHTS</h5>

                <p class="lh-lg">
                    Depending on your location and applicable laws, you may have certain rights regarding your personal information:
                </p>

                <p class="lh-lg"><strong>A. Right to Access</strong><br>
                    You have the right to request access to the personal information we hold about you and receive a copy of such information.
                </p>

                <p class="lh-lg"><strong>B. Right to Correction</strong><br>
                    You have the right to request correction of inaccurate or incomplete personal information we maintain about you.
                </p>

                <p class="lh-lg"><strong>C. Right to Deletion</strong><br>
                    You have the right to request deletion of your personal information, subject to certain exceptions (such as legal 
                    obligations to retain certain records).
                </p>

                <p class="lh-lg"><strong>D. Right to Data Portability</strong><br>
                    You have the right to receive your personal information in a structured, commonly used, and machine-readable format 
                    and transmit it to another controller.
                </p>

                <p class="lh-lg"><strong>E. Right to Object</strong><br>
                    You have the right to object to certain processing of your personal information, particularly for direct marketing purposes.
                </p>

                <p class="lh-lg"><strong>F. Right to Restrict Processing</strong><br>
                    You have the right to request restriction of processing of your personal information in certain circumstances.
                </p>

                <p class="lh-lg"><strong>G. Right to Withdraw Consent</strong><br>
                    Where processing is based on your consent, you have the right to withdraw consent at any time, without affecting the 
                    lawfulness of processing based on consent before its withdrawal.
                </p>

                <p class="lh-lg"><strong>H. Right to Lodge a Complaint</strong><br>
                    You have the right to lodge a complaint with a supervisory authority if you believe your privacy rights have been violated.
                </p>

                <p class="lh-lg">
                    To exercise any of these rights, please contact us at <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a> 
                    or call <a href="tel:{{ $contactPhone }}">{{ $contactPhone }}</a>. We will respond to your request within the 
                    timeframe required by applicable law, typically within 30 days.
                </p>

                <h5 class="fw-bold">8. CALIFORNIA PRIVACY RIGHTS</h5>

                <p class="lh-lg">
                    If you are a California resident, the California Consumer Privacy Act (CCPA) provides you with specific rights 
                    regarding your personal information:
                </p>

                <p class="lh-lg"><strong>Categories of Information Collected</strong><br>
                    Please refer to Section 1 of this Privacy Policy for detailed information about the categories of personal information 
                    we collect.
                </p>

                <p class="lh-lg"><strong>Right to Know</strong><br>
                    You have the right to request that we disclose:
                </p>
                <ul class="lh-lg">
                    <li>The categories of personal information we collected about you</li>
                    <li>The categories of sources from which we collected your personal information</li>
                    <li>Our business or commercial purposes for collecting or selling personal information</li>
                    <li>The categories of third parties with whom we share personal information</li>
                    <li>The specific pieces of personal information we collected about you</li>
                </ul>

                <p class="lh-lg"><strong>Right to Delete</strong><br>
                    You have the right to request deletion of your personal information, subject to certain exceptions.
                </p>

                <p class="lh-lg"><strong>Right to Opt-Out</strong><br>
                    You have the right to opt-out of the sale of your personal information. Note: {{ $siteName ?? 'IVS' }} does not 
                    sell your personal information to third parties.
                </p>

                <p class="lh-lg"><strong>Right to Non-Discrimination</strong><br>
                    You have the right not to receive discriminatory treatment for exercising your CCPA rights.
                </p>

                <p class="lh-lg"><strong>Authorized Agent</strong><br>
                    You may designate an authorized agent to make requests on your behalf. We may require verification of the agent's 
                    authority to act on your behalf.
                </p>

                <p class="lh-lg"><strong>Shine the Light Law</strong><br>
                    California Civil Code Section 1798.83 permits California residents to request information regarding disclosure of 
                    personal information to third parties for their direct marketing purposes. To make such a request, please contact us 
                    at <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a>.
                </p>

                <h5 class="fw-bold">9. EUROPEAN UNION DATA PROTECTION RIGHTS</h5>

                <p class="lh-lg">
                    If you are located in the European Economic Area (EEA), the General Data Protection Regulation (GDPR) provides you 
                    with specific rights regarding your personal data:
                </p>

                <p class="lh-lg"><strong>Legal Basis for Processing</strong><br>
                    We process your personal data based on one or more of the following legal bases:
                </p>
                <ul class="lh-lg">
                    <li><strong>Consent:</strong> You have given explicit consent for processing your personal data for specific purposes</li>
                    <li><strong>Contract Performance:</strong> Processing is necessary to perform our contract with you (providing passport 
                    application services)</li>
                    <li><strong>Legal Obligation:</strong> Processing is necessary to comply with legal obligations</li>
                    <li><strong>Legitimate Interests:</strong> Processing is necessary for our legitimate interests or those of a third 
                    party, provided your interests and fundamental rights do not override those interests</li>
                </ul>

                <p class="lh-lg"><strong>Data Subject Rights Under GDPR</strong><br>
                    In addition to the rights listed in Section 7, GDPR provides:
                </p>
                <ul class="lh-lg">
                    <li>Right to be informed about data processing activities</li>
                    <li>Right not to be subject to automated decision-making, including profiling</li>
                    <li>Right to withdraw consent at any time (where processing is based on consent)</li>
                </ul>

                <p class="lh-lg"><strong>International Data Transfers</strong><br>
                    If we transfer your personal data outside the EEA, we ensure appropriate safeguards are in place, such as:
                </p>
                <ul class="lh-lg">
                    <li>Standard Contractual Clauses approved by the European Commission</li>
                    <li>Adequacy decisions recognizing equivalent data protection levels</li>
                    <li>Your explicit consent for the transfer</li>
                </ul>

                <p class="lh-lg"><strong>Data Protection Officer</strong><br>
                    If required by law, we will appoint a Data Protection Officer (DPO) who can be contacted at 
                    <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a>.
                </p>

                <p class="lh-lg"><strong>Supervisory Authority</strong><br>
                    You have the right to lodge a complaint with your local data protection supervisory authority if you believe we have 
                    not complied with applicable data protection laws.
                </p>

                <h5 class="fw-bold">10. COOKIES AND TRACKING TECHNOLOGIES</h5>

                <p class="lh-lg">
                    {{ $siteName ?? 'IVS' }} uses cookies and similar tracking technologies to enhance your experience on our website, 
                    analyze website traffic, and understand user preferences.
                </p>

                <p class="lh-lg"><strong>What Are Cookies?</strong><br>
                    Cookies are small text files stored on your device when you visit a website. They help websites remember your 
                    preferences and improve functionality.
                </p>

                <p class="lh-lg"><strong>Types of Cookies We Use:</strong></p>
                <ul class="lh-lg">
                    <li><strong>Essential Cookies:</strong> Necessary for website functionality and security. These cannot be disabled.</li>
                    <li><strong>Functional Cookies:</strong> Remember your preferences and settings to enhance your experience.</li>
                    <li><strong>Analytics Cookies:</strong> Help us understand how visitors interact with our website by collecting 
                    anonymous statistical information.</li>
                    <li><strong>Marketing Cookies:</strong> Track your browsing across websites to deliver relevant advertisements.</li>
                </ul>

                <p class="lh-lg"><strong>Third-Party Cookies:</strong><br>
                    We may use third-party services such as Google Analytics, Facebook Pixel, and other analytics tools that place 
                    cookies on your device. These third parties have their own privacy policies.
                </p>

                <p class="lh-lg"><strong>Managing Cookies:</strong><br>
                    You can control and manage cookies through your browser settings. Most browsers allow you to:
                </p>
                <ul class="lh-lg">
                    <li>View and delete cookies</li>
                    <li>Block all cookies</li>
                    <li>Block third-party cookies</li>
                    <li>Clear cookies when you close your browser</li>
                </ul>
                <p class="lh-lg">
                    Please note that disabling cookies may affect your ability to use certain features of our website.
                </p>

                <h5 class="fw-bold">11. CHILDREN'S PRIVACY</h5>

                <p class="lh-lg">
                    {{ $siteName ?? 'IVS' }} services are not directed to children under the age of 13. We do not knowingly collect 
                    personal information from children under 13 without parental consent. While we process passport applications for 
                    minors, we require that parents or legal guardians provide the necessary information on behalf of the child.
                </p>
                <p class="lh-lg">
                    If you believe we have inadvertently collected personal information from a child under 13 without proper consent, 
                    please contact us immediately at <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a>, and we will take 
                    steps to delete such information from our systems.
                </p>

                <h5 class="fw-bold">12. THIRD-PARTY LINKS AND SERVICES</h5>

                <p class="lh-lg">
                    Our website may contain links to third-party websites, services, or applications that are not operated by 
                    {{ $siteName ?? 'IVS' }}. We are not responsible for the privacy practices of these third parties. We encourage 
                    you to review the privacy policies of any third-party sites you visit.
                </p>
                <p class="lh-lg">
                    When you click on third-party links or use third-party services integrated into our website, those third parties 
                    may collect information about you. Their collection and use of information is governed by their own privacy policies, 
                    not this Privacy Policy.
                </p>

                <h5 class="fw-bold">13. DATA BREACH NOTIFICATION</h5>

                <p class="lh-lg">
                    In the event of a data breach that affects your personal information, {{ $siteName ?? 'IVS' }} will:
                </p>
                <ul class="lh-lg">
                    <li>Investigate the breach promptly and determine its scope</li>
                    <li>Take immediate steps to contain and remediate the breach</li>
                    <li>Notify affected individuals without undue delay, as required by applicable law</li>
                    <li>Notify relevant supervisory authorities when legally required</li>
                    <li>Provide information about the nature of the breach and steps you can take to protect yourself</li>
                    <li>Implement measures to prevent future breaches</li>
                </ul>

                <h5 class="fw-bold">14. DO NOT TRACK SIGNALS</h5>

                <p class="lh-lg">
                    Some web browsers incorporate "Do Not Track" (DNT) features. Our website does not currently respond to DNT signals 
                    or similar mechanisms. We will update this Privacy Policy if we implement DNT signal recognition in the future.
                </p>

                <h5 class="fw-bold">15. CHANGES TO THIS PRIVACY POLICY</h5>

                <p class="lh-lg">
                    {{ $siteName ?? 'IVS' }} reserves the right to update or modify this Privacy Policy at any time. When we make 
                    material changes, we will:
                </p>
                <ul class="lh-lg">
                    <li>Update the "Last Updated" date at the top of this policy</li>
                    <li>Notify you via email (if you have provided an email address)</li>
                    <li>Display a prominent notice on our website</li>
                    <li>Request your consent if required by applicable law</li>
                </ul>
                <p class="lh-lg">
                    Your continued use of our services after changes to this Privacy Policy constitutes acceptance of the updated policy. 
                    We encourage you to review this Privacy Policy periodically to stay informed about how we protect your information.
                </p>

                <h5 class="fw-bold">16. INTERNATIONAL DATA TRANSFERS</h5>

                <p class="lh-lg">
                    Your personal information may be transferred to and processed in countries other than your country of residence. 
                    These countries may have data protection laws that differ from the laws of your country.
                </p>
                <p class="lh-lg">
                    When we transfer personal information internationally, we implement appropriate safeguards to ensure your information 
                    receives adequate protection, including:
                </p>
                <ul class="lh-lg">
                    <li>Standard Contractual Clauses approved by relevant authorities</li>
                    <li>Binding Corporate Rules for intra-organizational transfers</li>
                    <li>Adequacy decisions recognizing equivalent protection levels</li>
                    <li>Your explicit consent for specific transfers</li>
                </ul>

                <h5 class="fw-bold">17. CONTACT INFORMATION</h5>

                <p class="lh-lg">
                    If you have questions, concerns, or requests regarding this Privacy Policy or our data practices, please contact us:
                </p>
                <p class="lh-lg">
                    <strong>{{ $siteName ?? 'IVS' }}</strong><br>
                    Email: <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a><br>
                    Phone: <a href="tel:{{ $contactPhone }}">{{ $contactPhone }}</a><br>
                    Address: {{ $siteSettings['contact_address'] ?? '1234 Embassy Boulevard, Suite 500, Washington, DC 20005' }}
                </p>

                <p class="lh-lg">
                    For specific privacy-related inquiries or to exercise your privacy rights, please include "Privacy Request" in the 
                    subject line of your email or mention it when calling. We will respond to your inquiry within the timeframe required 
                    by applicable law.
                </p>

                <h5 class="fw-bold">18. CONSENT AND ACCEPTANCE</h5>

                <p class="lh-lg">
                    By using {{ $siteName ?? 'IVS' }} services, accessing our website, or providing your personal information to us, 
                    you acknowledge that you have read and understood this Privacy Policy and consent to the collection, use, and 
                    disclosure of your personal information as described herein.
                </p>
                <p class="lh-lg">
                    If you do not agree with this Privacy Policy, please do not use our services or provide us with your personal information.
                </p>

                <p class="lh-lg mt-4"><em>Last Updated: October 13, 2025</em></p>

                <p class="lh-lg mt-4">
                    <strong>Important Notice:</strong> {{ $siteName ?? 'IVS' }} is a private service provider and is not affiliated 
                    with or endorsed by any U.S. government agency. Blank passport application forms with instructions are available 
                    free of charge on official government websites. Our service fee covers professional application preparation assistance, 
                    document review, compliance verification, and submission support—not the forms themselves.
                </p>
            </div>
        </div>
    </section>
@endsection
