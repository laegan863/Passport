<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tblpersonalinfo;
use App\Models\Tblcontactinfo;
use App\Models\Tblpassportdetail;
use App\Models\Tblemergencycontact;
use App\Models\Tbltravelplan;
use App\Models\Tblverification;
use Carbon\Carbon;

class PassportApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $applicationTypes = ['new-passport', 'renewal-passport', 'lost-passport', 'child-passport', 'damage-passport'];
        $statuses = ['pending', 'abandoned', 'successful', 'completed'];
        
        // Sample data arrays
        $firstNames = ['John', 'Jane', 'Michael', 'Sarah', 'David', 'Emily', 'Robert', 'Lisa', 'James', 'Maria', 
                       'William', 'Jennifer', 'Richard', 'Patricia', 'Thomas', 'Linda', 'Charles', 'Barbara', 'Daniel', 'Susan'];
        $lastNames = ['Smith', 'Johnson', 'Williams', 'Brown', 'Jones', 'Garcia', 'Miller', 'Davis', 'Rodriguez', 'Martinez',
                     'Hernandez', 'Lopez', 'Gonzalez', 'Wilson', 'Anderson', 'Thomas', 'Taylor', 'Moore', 'Jackson', 'Martin'];
        $middleNames = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'R', 'S', 'T', 'W', null, null];
        
        $countries = ['United States', 'Mexico', 'Canada', 'United Kingdom', 'Philippines', 'India', 'China', 'Vietnam', 'South Korea'];
        $states = ['California', 'Texas', 'Florida', 'New York', 'Pennsylvania', 'Illinois', 'Ohio', 'Georgia', 'North Carolina', 'Michigan'];
        $cities = [
            'California' => ['Los Angeles', 'San Francisco', 'San Diego', 'San Jose'],
            'Texas' => ['Houston', 'Dallas', 'Austin', 'San Antonio'],
            'Florida' => ['Miami', 'Tampa', 'Orlando', 'Jacksonville'],
            'New York' => ['New York City', 'Buffalo', 'Rochester', 'Albany'],
            'Pennsylvania' => ['Philadelphia', 'Pittsburgh', 'Allentown', 'Erie'],
        ];
        
        $hairColors = ['Black', 'Brown', 'Blonde', 'Red', 'Gray', 'White'];
        $eyeColors = ['Brown', 'Blue', 'Green', 'Hazel', 'Gray'];
        $employmentStatuses = ['Employed', 'Self-Employed', 'Unemployed', 'Student', 'Retired'];
        $phoneTypes = ['Home', 'Work', 'Cellphone', 'Other'];
        $relationships = ['Spouse', 'Parent', 'Sibling', 'Friend', 'Child', 'Relative'];
        $securityQuestions = [
            'What was the name of your first pet?',
            'What is your mother\'s maiden name?',
            'What city were you born in?',
            'What was the name of your elementary school?',
            'What is your favorite color?'
        ];

        // Create 50 sample applications
        for ($i = 1; $i <= 50; $i++) {
            $firstName = $firstNames[array_rand($firstNames)];
            $lastName = $lastNames[array_rand($lastNames)];
            $middleName = $middleNames[array_rand($middleNames)];
            $email = strtolower($firstName . '.' . $lastName . $i . '@example.com');
            
            $state = $states[array_rand($states)];
            $cityArray = $cities[$state] ?? ['Springfield', 'Lincoln', 'Madison'];
            $city = $cityArray[array_rand($cityArray)];
            
            $applicationType = $applicationTypes[array_rand($applicationTypes)];
            $status = $statuses[array_rand($statuses)];
            
            // Distribute dates realistically
            if ($status === 'completed') {
                $createdAt = Carbon::now()->subDays(rand(10, 90));
            } elseif ($status === 'successful') {
                $createdAt = Carbon::now()->subDays(rand(5, 20));
            } elseif ($status === 'pending') {
                $createdAt = Carbon::now()->subDays(rand(1, 7));
            } else { // abandoned
                $createdAt = Carbon::now()->subDays(rand(15, 60));
            }
            
            // Create Personal Info
            $personalInfo = Tblpersonalinfo::create([
                'application_type' => $applicationType,
                'first_name' => $firstName,
                'middle_name' => $middleName,
                'last_name' => $lastName,
                'name_status' => 'yes',
                'previous_names' => rand(0, 10) > 7 ? json_encode([
                    ['first' => $firstNames[array_rand($firstNames)], 'middle' => 'M', 'last' => $lastNames[array_rand($lastNames)]]
                ]) : null,
                'birth_month' => str_pad(rand(1, 12), 2, '0', STR_PAD_LEFT),
                'birth_day' => str_pad(rand(1, 28), 2, '0', STR_PAD_LEFT),
                'birth_year' => rand(1960, 2010),
                'gender' => rand(0, 1) ? 'Male' : 'Female',
                'birth_country' => $countries[array_rand($countries)],
                'birth_state' => $state,
                'birth_city' => $city,
                'height_ft' => rand(4, 6),
                'height_in' => rand(0, 11),
                'hair_color' => $hairColors[array_rand($hairColors)],
                'eye_color' => $eyeColors[array_rand($eyeColors)],
                'employment_status' => $employmentStatuses[array_rand($employmentStatuses)],
                'email' => $email,
                'status' => $status,
                'created_at' => $createdAt,
                'updated_at' => $createdAt->copy()->addHours(rand(1, 48)),
            ]);

            // Create Contact Info
            Tblcontactinfo::create([
                'order_id' => $personalInfo->id,
                'primary_phone' => '(' . rand(200, 999) . ') ' . rand(200, 999) . '-' . rand(1000, 9999),
                'phone_type' => $phoneTypes[array_rand($phoneTypes)],
                'additional_numbers' => rand(0, 10) > 6 ? json_encode([
                    ['number' => '(' . rand(200, 999) . ') ' . rand(200, 999) . '-' . rand(1000, 9999), 'type' => 'Work']
                ]) : null,
                'address_line1' => rand(100, 9999) . ' ' . $lastNames[array_rand($lastNames)] . ' Street',
                'address_unit' => rand(0, 10) > 7 ? 'Apt ' . rand(1, 500) : null,
                'address_line2' => null,
                'state' => $state,
                'city' => $city,
                'zip' => str_pad(rand(10000, 99999), 5, '0', STR_PAD_LEFT),
                'same_mailing' => rand(0, 10) > 3,
                'mail_address_line1' => rand(0, 10) > 3 ? null : 'PO Box ' . rand(100, 9999),
                'mail_address_unit' => null,
                'mail_address_line2' => null,
                'mail_state' => rand(0, 10) > 3 ? null : $states[array_rand($states)],
                'mail_city' => rand(0, 10) > 3 ? null : $city,
                'mail_zip' => rand(0, 10) > 3 ? null : str_pad(rand(10000, 99999), 5, '0', STR_PAD_LEFT),
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);

            // Create Passport Details (only for renewal/lost/damage applications)
            if (in_array($applicationType, ['renewal-passport', 'lost-passport', 'damage-passport'])) {
                $issueDate = Carbon::now()->subYears(rand(1, 15));
                Tblpassportdetail::create([
                    'order_id' => $personalInfo->id,
                    'book_fullname' => $firstName . ' ' . ($middleName ? $middleName . ' ' : '') . $lastName,
                    'book_number' => strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2)) . rand(10000000, 99999999),
                    'book_issue' => $issueDate,
                    'book_expiry' => $issueDate->copy()->addYears(10),
                    'book_name_change' => rand(0, 10) > 8 ? 'yes' : 'no',
                    'change_reason' => rand(0, 10) > 8 ? (rand(0, 1) ? 'Marriage' : 'Court Order') : null,
                    'prev_name' => rand(0, 10) > 8 ? json_encode([
                        'first' => $firstNames[array_rand($firstNames)],
                        'middle' => 'M',
                        'last' => $lastNames[array_rand($lastNames)]
                    ]) : null,
                    'place_name_change' => rand(0, 10) > 8 ? $city . ', ' . $state : null,
                    'date_name_change' => rand(0, 10) > 8 ? Carbon::now()->subYears(rand(1, 5)) : null,
                    'card_applied' => rand(0, 10) > 6 ? 'yes' : 'no',
                    'card_fullname' => rand(0, 10) > 6 ? $firstName . ' ' . $lastName : null,
                    'card_number' => rand(0, 10) > 6 ? rand(100000000, 999999999) : null,
                    'card_issue' => rand(0, 10) > 6 ? Carbon::now()->subYears(rand(1, 3)) : null,
                    'card_expiry' => rand(0, 10) > 6 ? Carbon::now()->addYears(rand(1, 5)) : null,
                    'card_status' => $applicationType === 'lost-passport' ? 'Lost' : ($applicationType === 'damage-passport' ? 'Expired' : null),
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ]);
            }

            // Create Emergency Contact
            $emergFirstName = $firstNames[array_rand($firstNames)];
            $emergLastName = $lastNames[array_rand($lastNames)];
            Tblemergencycontact::create([
                'order_id' => $personalInfo->id,
                'relationship' => $relationships[array_rand($relationships)],
                'email' => strtolower($emergFirstName . '.' . $emergLastName . '@example.com'),
                'first_name' => $emergFirstName,
                'middle_name' => $middleNames[array_rand($middleNames)],
                'last_name' => $emergLastName,
                'contact_number' => '(' . rand(200, 999) . ') ' . rand(200, 999) . '-' . rand(1000, 9999),
                'phone_type' => $phoneTypes[array_rand($phoneTypes)],
                'address1' => rand(100, 9999) . ' ' . $lastNames[array_rand($lastNames)] . ' Avenue',
                'address2' => null,
                'apartment' => rand(0, 10) > 7 ? 'Unit ' . rand(1, 200) : null,
                'country' => 'United States',
                'zip' => str_pad(rand(10000, 99999), 5, '0', STR_PAD_LEFT),
                'city' => $city,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);

            // Create Travel Plans
            $hasTravelPlans = rand(0, 10) > 3;
            $departureDate = $hasTravelPlans ? Carbon::now()->addDays(rand(30, 180)) : null;
            Tbltravelplan::create([
                'order_id' => $personalInfo->id,
                'has_travel_plans' => $hasTravelPlans,
                'departure_date' => $departureDate,
                'return_date' => $hasTravelPlans && rand(0, 10) > 2 ? $departureDate->copy()->addDays(rand(7, 30)) : null,
                'no_return_date' => $hasTravelPlans && rand(0, 10) > 7,
                'travel_country' => $hasTravelPlans ? json_encode([
                    ['name' => ['United Kingdom', 'France', 'Germany', 'Japan', 'Australia', 'Mexico', 'Canada'][rand(0, 6)]]
                ]) : null,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);

            // Create Verification
            Tblverification::create([
                'order_id' => $personalInfo->id,
                'security_question' => $securityQuestions[array_rand($securityQuestions)],
                'answer' => strtolower($firstNames[array_rand($firstNames)] . rand(1, 100)),
                'ssn_encrypted' => encrypt(rand(100, 999) . '-' . rand(10, 99) . '-' . rand(1000, 9999)),
                'ssn_repeat_encrypted' => encrypt(rand(100, 999) . '-' . rand(10, 99) . '-' . rand(1000, 9999)),
                'consent_agreed' => true,
                'terms_agreed' => true,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);

            $this->command->info("Created application {$i}/50 - {$firstName} {$lastName} ({$status})");
        }

        $this->command->info('Successfully created 50 sample passport applications!');
    }
}
