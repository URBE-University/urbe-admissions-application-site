<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
        <style>
            * {
                font-size: 10px;
                font-family: 'Inter', sans-serif;
            }

            .container {
                display: grid;
                grid-template-columns: repeat(3,minmax(0,1fr));
                gap: 1rem;
            }
            .head {
                text-align: center;
                grid-column: span 3 / span 3;
            }
            .title-bar {
                background-color: #073260;
                color: white;
                text-transform: uppercase;
                font-weight: 700;
                text-align: center;
                padding-top: .5rem;
                padding-bottom: .5rem;
                width: 100%;
                grid-column: span 3 / span 3;
            }
            .field-container {
                display: flex;
                align-items: center;
                padding: .3rem .5rem .3rem .5rem;
            }
            .field-label {
                font-weight: 600;
            }
            .grid-item {
                border: 1px solid #555e6d;
                grid-column: span 1 / span 1;
            }

            .audit-item {
                display: grid;
                align-items: center;
                grid-template-columns: repeat(3,minmax(0,1fr));
                gap: 1rem;
                border-bottom: .5px solid grey;
                padding-top: .5rem;
                padding-bottom: .5rem;
            }

            .signature {
                font-family: 'Caveat', cursive !important;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="head">
                <img src="https://admissions.urbeuniversity.edu/urbe-logo.svg" alt="URBE University" style="width: 14rem; margin-left: auto; margin-right: auto; display: block">
                <div style="margin-top: 1rem">{!!__("11430 NW 20<sup>th</sup> St. Suite 150 Sweetwater, Florida. 33172")!!}</div>
                <div style="margin-top: .5rem; font-weight:800; text-transform:uppercase; font-size: 1.5rem">{{__("Application for admission")}}</div>
                <p>{{ $application->uuid }}</p>
            </div>

            <div class="title-bar">
                {{__("Applicant Information")}}
            </div>

            <div class="grid-item">
                <div class="field-container">
                    <span class="field-label">{{__("First Name:")}}</span>
                    <span style="margin-left: .6rem">{{ $application->first_name }}</span>
                </div>
            </div>
            <div class="grid-item">
                <div class="field-container">
                    <span class="field-label">{{__("Middle Name:")}}</span>
                    <span style="margin-left: .6rem">{{ $application->middle_name }}</span>
                </div>
            </div>
            <div class="grid-item">
                <div class="field-container">
                    <span class="field-label">{{__("Last Name:")}}</span>
                    <span style="margin-left: .6rem">{{ $application->last_name }}</span>
                </div>
            </div>

            <div class="grid-item">
                <div class="field-container">
                    <span class="field-label">{{__("Address:")}}</span>
                    <span style="margin-left: .6rem">{{ $application->street }}</span>
                </div>
            </div>
            <div class="grid-item">
                <div class="field-container">
                    <span class="field-label">{{__("City:")}}</span>
                    <span style="margin-left: .6rem">{{ $application->city }}</span>
                </div>
            </div>
            <div style="grid-column: span 1 / span 1;">
                <div style="display:grid; grid-template-columns: repeat(2,minmax(0,1fr)); gap: 1rem;">
                    <div class="grid-item" style="padding: .3rem .5rem .3rem .5rem;">
                        <span class="field-label">{{__("State:")}}</span>
                        <span style="margin-left: .6rem">{{ $application->state }}</span>
                    </div>
                    <div class="grid-item" style="padding: .3rem .5rem .3rem .5rem;">
                        <span class="field-label">{{__("Zip Code:")}}</span>
                        <span style="margin-left: .6rem">{{ $application->zip }}</span>
                    </div>
                </div>
            </div>

            <div class="grid-item">
                <div class="field-container">
                    <span class="field-label">{{__("Phone:")}}</span>
                    <span style="margin-left: .6rem">{{ $application->phone_code . $application->phone }}</span>
                </div>
            </div>
            <div class="grid-item">
                <div class="field-container">
                    <span class="field-label">{{__("E-mail:")}}</span>
                    <span style="margin-left: .6rem">{{ $application->email }}</span>
                </div>
            </div>
            <div class="grid-item">
                <div class="field-container">
                    <span class="field-label">{{__("Gender:")}}</span>
                    <span style="margin-left: .6rem">{{ $application->gender }}</span>
                </div>
            </div>
            <div class="grid-item">
                <div class="field-container">
                    <span class="field-label">{{__("Marital Status:")}}</span>
                    <span style="margin-left: .6rem">{{ $application->marital_status }}</span>
                </div>
            </div>
            <div class="grid-item">
                <div class="field-container">
                    <span class="field-label">{{__("Date of Birth:")}}</span>
                    <span style="margin-left: .6rem">{{ date('m/d/Y', strtotime($application->dob)) }}</span>
                </div>
            </div>
            <div class="grid-item">
                <div class="field-container">
                    <span class="field-label">{{__("SSN (Last 4):")}}</span>
                    <span style="margin-left: .6rem">
                        {{ ($application->ssn) ? 'XXX-XX-' . Str::substr(Crypt::decryptString($application->ssn), -4) : '-' }}
                    </span>
                </div>
            </div>
            <div class="grid-item">
                <div class="field-container">
                    <span class="field-label">{{__("ID:")}}</span>
                    <span style="margin-left: .6rem">{{ Crypt::decryptString($application->dl_passport) ?? '-' }}</span>
                </div>
            </div>

            <div class="grid-item">
                <div class="field-container">
                    <span class="field-label">{{__("Are you a veteran?")}}</span>
                    <span style="margin-left: .6rem">{{ ($application->military === 1) ? 'Yes' : 'No' }}</span>
                </div>
            </div>

            <div class="grid-item">
                <div class="field-container">
                    <span class="field-label">{{__("Ethnicity:")}}</span>
                    <span style="margin-left: .6rem">{{ $application->ethnicity }}</span>
                </div>
            </div>

            <div class="grid-item">
                <div class="field-container">
                    <span class="field-label">{{__("Interested in Student Visa (I-20):")}}</span>
                    <span style="margin-left: .6rem">{{ ($application->is_visa) ? "YES" : "NO" }}</span>
                </div>
            </div>

            <div class="title-bar">
                {{__("Academic Program")}}
            </div>
            <div class="" style="grid-column: span 3 / span 3; border: 1px solid #555e6d;">
                <div class="field-container">
                    <span class="field-label">{{__("Program:")}}</span>
                    <span style="margin-left: .6rem">{{ $application->program }}</span>
                </div>
            </div>
            <div class="" style="grid-column: span 3 / span 3; border: 1px solid #555e6d;">
                <div class="field-container">
                    <span class="field-label">{{__("Concentration:")}}</span>
                    <span style="margin-left: .6rem">{{ $application->concentration }}</span>
                </div>
            </div>
            <div class="" style="grid-column: span 3 / span 3; border: 1px solid #555e6d;">
                <div class="field-container">
                    <span class="field-label">{{__("Format:")}}</span>
                    <span style="margin-left: .6rem; text-transform: capitalize;">{{ str_replace('_', ' ', $application->program_format) }}</span>
                </div>
            </div>
            <div class="" style="grid-column: span 3 / span 3; border: 1px solid #555e6d;">
                <div class="field-container">
                    <span class="field-label">{{__("Language:")}}</span>
                    <span style="margin-left: .6rem">{{ ucfirst($application->program_language) }}</span>
                </div>
            </div>

            <div class="title-bar">
                {{__("Sign document")}}
            </div>

            {{-- Signature --}}
            <div class="" style="grid-column: span 2 / span 2">
                <div class="field-container" style="border-bottom: 1px solid #555e6d">
                    <span class="field-label">{{__("Applicant Signature:")}}</span>
                    <span style="margin-left: .6rem; font-size: 8px"><span class="signature">{{ $application->first_name . ' ' . $application->middle_name . ' ' . $application->last_name}}</span> <span style="margin-left: .6rem">sigature-{{ $application->applicant_verification_code }}</span></span>
                </div>
            </div>

            <div class="" style="grid-column: span 1 / span 1">
                <div class="field-container" style="border-bottom: 1px solid #555e6d">
                    <span class="field-label">{{__("Date:")}}</span>
                    <span style="margin-left: .6rem">{{ ($application->applicant_signature) ? date('m-d-Y h:i:s a', strtotime($application->applicant_signature)) : ''}}</span>
                </div>
            </div>

            <div class="" style="grid-column: span 3 / span 3">
                <div class="field-container" style="border-bottom: 1px solid #555e6d">
                    <span class="field-label">{{__("Legal Guardian Name (if applicant under 18):")}}</span>
                    <span style="margin-left: .6rem">{{ $application->legal_guardian_name ?? '' }}</span>
                </div>
            </div>
            <div class="" style="grid-column: span 2 / span 2">
                <div class="field-container" style="border-bottom: 1px solid #555e6d">
                    <span class="field-label">{{__("Legal Guardian Signature:")}}</span>
                    @if ($application->legal_guardian_name)
                        <span style="margin-left: .6rem; font-size: 8px"><span class="signature">{{ $application->legal_guardian_name }}</span> <span style="margin-left: .6rem">sigature-{{ $application->legal_guardian_verification_code }}</span></span>
                    @endif
                </div>
            </div>
            <div class="" style="grid-column: span 1 / span 1">
                <div class="field-container" style="border-bottom: 1px solid #555e6d">
                    <span class="field-label">{{__("Date:")}}</span>
                    <span style="margin-left: .6rem">{{ ($application->legal_guardian_signature) ? date('m-d-Y h:i:s a', strtotime($application->legal_guardian_signature)) : ''}}</span>
                </div>
            </div>

            <div class="title-bar">
                {{__("Academic Review Commitee Comments")}}
            </div>
            <div class="" style="grid-column: span 3 / span 3">
                <div class="field-container" style="border: 1px solid #555e6d; height: 14rem"></div>
            </div>

            <div style="margin-top: 2rem; grid-column: span 3 / span 3; display:grid; grid-template-columns: repeat(2,minmax(0,1fr)); gap: 1rem;">
                <div style="grid-column: span 1 / span 1">
                    <div class="field-container" style="border-bottom: 1px solid #555e6d">
                        <span class="field-label">{{__("Dean:")}}</span>
                        <span style="margin-left: .6rem"></span>
                    </div>
                </div>
                <div style="grid-column: span 1 / span 1">
                    <div class="field-container" style="border-bottom: 1px solid #555e6d">
                        <span class="field-label">{{__("Academic Advisor:")}}</span>
                        <span style="margin-left: .6rem"></span>
                    </div>
                </div>
            </div>
        </div>
        <p style="margin-top: 2rem; text-align: right">Application ID: {{ $application->uuid }}</p>


        <div style="page-break-after:always;"></div>

        {{-- Page 2 - Audit Trail --}}
        <div style="display: flex; align-items: center; justify-content: space-between">
            <h1 style="font-size: 2rem">Applicant Audit trail</h1>
            <p>Application ID: {{ $application->uuid }}</p>
        </div>

        <div style="margin-top: 1rem">
            <div class="audit-item">
                <div class="">&#9745; Application started</div>
                <div class="">{{ $application->applicant_name . __(" started the application process from the IP: ") . $application->applicant_signature_ip }}</div>
                <div class="" style="text-align: right">{{ Carbon\Carbon::parse($application->created_at)->subMinute()->format("m/d/Y h:i:s a") }}</div>
            </div>

            <div class="audit-item">
                <div class="">&#9745; Validation code sent</div>
                <div class="">{{ $application->applicant_name . __(" requested a validation code via email to verify his/her/its identity. Code was sent to: ") . $application->applicant_email }}</div>
                <div class="" style="text-align: right">{{ Carbon\Carbon::parse($application->applicant_acknowledgement)->format("m/d/Y h:i:s a") }}</div>
            </div>

            <div class="audit-item">
                <div class="">&#9745; Identity validated</div>
                <div class="">{{ $application->applicant_name . __(" Validated his/her/its identity using the code sent via email. ") }}</div>
                <div class="" style="text-align: right">{{ Carbon\Carbon::parse($application->applicant_verification)->format("m/d/Y h:i:s a") }}</div>
            </div>

            <div class="audit-item">
                <div class="">&#9745; Application signed and finalized</div>
                <div class="">{{ $application->applicant_name . __(" signed he document from IP: ") . $application->applicant_signature_ip . __(" using code ") . $application->applicant_verification_code }}</div>
                <div class="" style="text-align: right">{{ Carbon\Carbon::parse($application->applicant_signature)->format("m/d/Y h:i:s a") }}</div>
            </div>

            {{-- Legal Guardian Audit Section --}}

            @if ($application->legal_guardian_name && $application->legal_guardian_email)
                <div style="margin-top: 2rem">
                    <h1 style="font-size: 2rem">Legal Guardian Audit trail</h1>
                </div>

                <div class="audit-item">
                    <div class="">&#9745; Validation code sent</div>
                    <div class="">{{ __("Validation code sent to ") . $application->legal_guardian_name . '`s email ' . $application->legal_guardian_email }}</div>
                    <div class="" style="text-align: right">{{ Carbon\Carbon::parse($application->applicant_acknowledgement)->format("m/d/Y h:i:s a") }}</div>
                </div>

                <div class="audit-item">
                    <div class="">&#9745; Identity validated</div>
                    <div class="">{{ $application->legal_guardian_name . __(" Validated his/her/its identity using the code sent via email. ") }}</div>
                    <div class="" style="text-align: right">{{ Carbon\Carbon::parse($application->legal_guardian_verification)->format("m/d/Y h:i:s a") }}</div>
                </div>

                <div class="audit-item">
                    <div class="">&#9745; Application signed and finalized</div>
                    <div class="">{{ $application->legal_guardian_name . __(" signed he document from IP: ") . $application->legal_guardian_signature_ip . __(" using code ") . $application->legal_guardian_verification_code }}</div>
                    <div class="" style="text-align: right">{{ Carbon\Carbon::parse($application->legal_guardian_signature)->format("m/d/Y h:i:s a") }}</div>
                </div>
            @endif

            <div style="margin-top: 2rem">
                <p>This document has been electronically verified and signed using unique timestamp-based identifiers, by URBE University Admissions Applications Platform: <a href="https://admissions.urbe.university">https://admissions.urbe.university</a></p>
                <p style="font-size: 12px; font-weight:700; color: red; padding: 10px 10px; background-color: rgb(255, 227, 227); border-radius: 5px; text-center">PLEASE, KEEP BOTH PAGES ATTACHED AT ALL TIMES</p>
            </div>
        </div>
    </body>
</html>
