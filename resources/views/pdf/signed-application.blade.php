<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            * {
                font-size: 8pt;
            }

            .page-break {
                page-break-after: always;
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
        </style>
    </head>
    <body>
        <div class="container">
            <div class="head">
                <img src="https://urbe.university/wp-content/uploads/2019/01/urbe-white-logo.jpg" alt="URBE University" style="width: 11rem; margin-left: auto; margin-right: auto; display: block">
                <div style="margin-top: 1rem">{!!__("11430 NW 20<sup>th</sup> St. Suite 150 Sweetwater, Florida. 33172")!!}</div>
                <div style="margin-top: .5rem; font-weight:800; text-transform:uppercase; font-size: 1.5rem">{{__("Application for admission")}}</div>
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
                    <span class="field-label">{{__("Social Security:")}}</span>
                    <span style="margin-left: .6rem">{{__("Encrypted")}}</span>
                </div>
            </div>
            <div class="grid-item">
                <div class="field-container">
                    <span class="field-label">{{__("ID:")}}</span>
                    <span style="margin-left: .6rem">{{__("Attached to application")}}</span>
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

            <div class="page-break"></div>

            <div class="title-bar">
                {{__("Sign document")}}
            </div>

            {{-- Signature --}}
            <div class="" style="grid-column: span 2 / span 2">
                <div class="field-container" style="border-bottom: 1px solid #555e6d">
                    <span class="field-label">{{__("Applicant Signature:")}}</span>
                    <span style="margin-left: .6rem">{{ $application->first_name . ' ' . $application->middle_name . ' ' . $application->last_name  . ' [' . $application->applicant_verification_code . ']'}}</span>
                </div>
            </div>

            <div class="" style="grid-column: span 1 / span 1">
                <div class="field-container" style="border-bottom: 1px solid #555e6d">
                    <span class="field-label">{{__("Date:")}}</span>
                    <span style="margin-left: .6rem">{{ ($application->applicant_signature) ? date('m/d/Y', strtotime($application->applicant_signature)) : ''}}</span>
                </div>
            </div>


            <div class="" style="grid-column: span 3 / span 3">
                <div class="field-container" style="border-bottom: 1px solid #555e6d">
                    <span class="field-label">{{__("Legal Guardian Name (if applicant under 18):")}}</span>
                    <span style="margin-left: .6rem">{{ $application->legal_guardian_name ?? 'n/a' }}</span>
                </div>
            </div>
            <div class="" style="grid-column: span 2 / span 2">
                <div class="field-container" style="border-bottom: 1px solid #555e6d">
                    <span class="field-label">{{__("Legal Guardian Signature:")}}</span>
                    <span style="margin-left: .6rem">{{ ($application->legal_guardian_name) ? $application->legal_guardian_name  . ' [' . $application->legal_guardian_verification_code . ']' : 'n/a' }}</span>
                </div>
            </div>
            <div class="" style="grid-column: span 1 / span 1">
                <div class="field-container" style="border-bottom: 1px solid #555e6d">
                    <span class="field-label">{{__("Date:")}}</span>
                    <span style="margin-left: .6rem">{{ ($application->legal_guardian_signature) ? date('m/d/Y', strtotime($application->legal_guardian_signature)) : 'n/a'}}</span>
                </div>
            </div>

            <div class="title-bar">
                {{__("Academic Review Commitee Comments")}}
            </div>
            <div class="" style="grid-column: span 3 / span 3">
                <div class="field-container" style="border: 1px solid #555e6d; height: 12rem"></div>
            </div>

            <div style="grid-column: span 3 / span 3; display:grid; grid-template-columns: repeat(2,minmax(0,1fr)); gap: 1rem;">
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
    </body>
</html>
