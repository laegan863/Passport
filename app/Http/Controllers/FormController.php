<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Tblpersonalinfo;
use App\Models\Tblcontactinfo;
use App\Models\Tblpassportdetail;
use App\Models\Tblemergencycontact;
use App\Models\Tbltravelplan;
use App\Models\Tblverification;

class FormController extends Controller
{
    public function renewal_passport()
    {
        Session::put('type', 'renewal passport');
        return to_route('page.eq');
    }
    public function new_passport()
    {
        Session::put('type', 'new passport');
        return to_route('personal-info');
    }
    public function lost_passport()
    {
        Session::put('type', 'lost passport');
        return to_route('personal-info');
    }
    public function child_passport()
    {
        Session::put('type', 'child passport');
        return to_route('personal-info');
    }
    public function stolen_passport()
    {
        Session::put('type', 'stolen passport');
        return to_route('personal-info');
    }
    public function damage_passport()
    {
        Session::put('type', 'damage passport');
        return to_route('personal-info');
    }

    public function select_passport()
    {
        return view('main.content.forms.select-passport');
    }
    public function renewal_before_application()
    {
        return view('main.content.forms.renewal-before-application');
    }
    public function personal_info()
    {
        return view('main.content.forms.personal-info');
    }
    public function store_personal_info(Request $request)
    {
        $validated = $request->validate([
            'first_name'         => 'required|string|max:255',
            'middle_name'        => 'nullable|string|max:255',
            'last_name'          => 'required|string|max:255',
            'name_status'        => 'required|in:yes,no',
            'previous_names'     => 'nullable|array',
            'previous_names.*'   => 'nullable|string|max:255',

            'birth_month'        => 'required|string',
            'birth_day'          => 'required|integer|min:1|max:31',
            'birth_year'         => 'required|integer|min:1900|max:' . date('Y'),
            'gender'             => 'required|in:Male,Female',

            'birth_country'      => 'required|string|max:255',
            'birth_state'        => 'required|string|max:255',
            'birth_city'         => 'required|string|max:255',

            'height_ft'          => 'required|integer|min:1|max:10',
            'height_in'          => 'required|integer|min:0|max:11',
            'hair_color'         => 'required|string|max:50',
            'eye_color'          => 'required|string|max:50',

            'employment_status'  => 'required|string|max:100',
            'email'              => 'required|email|max:255',
        ]);

        $validated['application_type'] = session('type');

        $data = Tblpersonalinfo::updateOrCreate(['id' => session('id')], $validated);
        Session::put('id', $data->id);
        return to_route('contact-info');
    }

    public function contact_info()
    {
        return view('main.content.forms.contact-info');
    }
    public function store_contact_info(Request $request)
    {
        $validated = $request->validate([
            'primary_phone' => 'required|string|max:20',
            'phone_type' => 'nullable|string|max:50',
            'additional_numbers' => 'nullable|array',
            'address_line1' => 'required|string|max:255',
            'address_unit' => 'nullable|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'zip' => 'nullable|string|max:20',
            'same_mailing' => 'required|in:yes,no',
            'mail_address_line1' => 'nullable|string|max:255',
            'mail_address_unit' => 'nullable|string|max:255',
            'mail_address_line2' => 'nullable|string|max:255',
            'mail_state' => 'nullable|string|max:100',
            'mail_city' => 'nullable|string|max:100',
            'mail_zip' => 'nullable|string|max:20',
        ]);

        if ($validated['same_mailing'] === 'yes') {
            $validated['mail_address_line1'] = $validated['address_line1'];
            $validated['mail_address_unit']  = $validated['address_unit'] ?? null;
            $validated['mail_address_line2'] = $validated['address_line2'] ?? null;
            $validated['mail_state']         = $validated['state'] ?? null;
            $validated['mail_city']          = $validated['city'] ?? null;
            $validated['mail_zip']           = $validated['zip'] ?? null;
        }

        $validated['order_id'] = Session::get('id');
        $validated['same_mailing'] = $validated['same_mailing'] === 'yes';
        Tblcontactinfo::updateOrCreate(['order_id' => session('id')], $validated);
        return to_route('passport-details');

    }


    public function passport_details()
    {
        return view('main.content.forms.passport-details');
    }
    public function store_passport_details(Request $request)
    {
        $validated = $request->validate([
            // PASSPORT BOOK
            'book_fullname'     => 'required|string|max:255',
            'book_number'       => 'required|string|max:100',
            'book_issue'        => 'required|date',
            'book_expiry'       => 'required|date',

            // NAME CHANGE SECTION (applies only if "Yes" selected)
            'book_name_change'  => 'required|in:yes,no',
            'change_reason'     => 'required_if:book_name_change,yes|string|nullable',
            'prev_name'         => 'required_if:book_name_change,yes|array|nullable',
            'place_name_change' => 'required_if:book_name_change,yes|string|max:255|nullable',
            'date_name_change'  => 'required_if:book_name_change,yes|date|nullable',

            // PASSPORT CARD
            'card_applied'  => 'required|in:yes,no',
            'card_fullname' => 'required_if:card_applied,yes|string|max:255|nullable',
            'card_number'   => 'required_if:card_applied,yes|string|max:100|nullable',
            'card_issue'    => 'required_if:card_applied,yes|date|nullable',
            'card_expiry'   => 'required_if:card_applied,yes|date|nullable',
            'card_status'   => 'required_if:card_applied,yes|string|in:Stolen,Lost,Expired|nullable',
        ]);


        $validated['order_id'] = session('id');

        Tblpassportdetail::updateOrCreate(['order_id' => $validated['order_id']], $validated);
        
        if(session('type') === 'renewal passport'){
            return to_route('emergency-contact');
        }else{
            return to_route('family-info');
        }

    }

    public function emergency_contact()
    {
        return view('main.content.forms.emergency-contact');
    }
    public function store_emergency_contact(Request $request)
    {
        $validated = $request->validate([
            'relationship'   => 'required|string|max:100',
            'email'          => 'required|email|max:255',
            'first_name'     => 'required|string|max:100',
            'middle_name'    => 'nullable|string|max:100',
            'last_name'      => 'required|string|max:100',
            'contact_number' => 'required|string|max:20',
            'phone_type'     => 'nullable|string|max:50',
            'address1'       => 'required|string|max:255',
            'address2'       => 'nullable|string|max:255',
            'apartment'      => 'nullable|string|max:100',
            'country'        => 'required|string|max:100',
            'zip'            => 'required|string|max:20',
            'city'           => 'required|string|max:100',
        ]);

        $validated['order_id'] = session('id');
        Tblemergencycontact::updateOrCreate(['order_id' => $validated['order_id']], $validated);
        return to_route('travel-plans');

    }

    public function travel_plans()
    {
        return view('main.content.forms.travel-plans');
    }
    public function store_travel_plans(Request $request)
    {
        $validated = $request->validate([
            'has_travel_plans' => 'required|in:yes,no',
            'departure_date'   => 'required_if:has_travel_plans,yes|date|nullable',
            'return_date'      => 'required_if:has_travel_plans,yes|date|nullable',
            'travel_country'   => 'required_if:has_travel_plans,yes|array',
        ], [
            'has_travel_plans.required' => 'Please indicate if you have travel plans.',
            'has_travel_plans.in' => 'Invalid selection.',
            'departure_date.required_if' => 'Departure date is required if you have travel plans.',
            'return_date.required_if' => 'Return date is required if you have travel plans.',
            'travel_country.required_if' => 'Please select at least one country if you have travel plans.',
        ]);

        $validated['has_travel_plans'] = $validated['has_travel_plans'] === 'yes';
        $validated['order_id'] = session('id');
        $validated['travel_country'] = $request->input('travel_country', []);

        if (!$validated['has_travel_plans']) {
            $validated['departure_date'] = null;
            $validated['return_date'] = null;
            $validated['travel_country'] = [];
        }

        Tbltravelplan::updateOrCreate(
            ['order_id' => $validated['order_id']],
            $validated
        );

        return to_route('verification');
    }


    public function verification()
    {
        return view('main.content.forms.verification');
    }

    public function store_verification(Request $request)
    {
        $validated = $request->validate([
            'security_question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
            'ssn' => 'required|string|max:11|same:ssn_repeat',
            'ssn_repeat' => 'required|string|max:11',
            'consentCheck' => 'accepted',
            'termsCheck' => 'accepted',
        ]);

        Tblverification::updateOrCreate(
            ['order_id' => session('id')], 
            [
                'security_question' => $validated['security_question'],
                'answer' => $validated['answer'],
                'ssn_encrypted' => $validated['ssn'],
                'ssn_repeat_encrypted' => $validated['ssn_repeat'],
                'consent_agreed' => true,
                'terms_agreed' => true,
            ]
        );
        
        return to_route('checkout');
    }
}
