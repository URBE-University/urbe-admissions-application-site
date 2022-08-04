<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContractFieldsToApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string('applicant_name')->nullable();
            $table->string('applicant_email')->nullable();
            $table->string('applicant_identification_method')->nullable();
            $table->string('applicant_verification_code')->nullable();
            $table->timestamp('applicant_verification')->nullable();
            $table->string('applicant_verification_ip')->nullable();
            $table->timestamp('applicant_acknowledgement')->nullable();
            $table->timestamp('applicant_signature')->nullable();
            $table->string('applicant_signature_ip')->nullable();

            $table->string('legal_guardian_name')->nullable();
            $table->string('legal_guardian_email')->nullable();
            $table->string('legal_guardian_relation')->nullable();
            $table->string('legal_guardian_identification_method')->nullable();
            $table->string('legal_guardian_verification_code')->nullable();
            $table->timestamp('legal_guardian_verification')->nullable();
            $table->string('legal_guardian_verification_ip')->nullable();
            $table->timestamp('legal_guardian_acknowledgement')->nullable();
            $table->timestamp('legal_guardian_signature')->nullable();
            $table->string('legal_guardian_signature_ip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn([
                'applicant_name',
                'applicant_email',
                'applicant_identification_method',
                'applicant_verification',
                'applicant_verification_ip',
                'applicant_acknowledgement',
                'applicant_signature',
                'applicant_signature_ip',
                'legal_guardian_name',
                'legal_guardian_email',
                'legal_guardian_relation',
                'legal_guardian_identification_method',
                'legal_guardian_verification',
                'legal_guardian_verification_ip',
                'legal_guardian_acknowledgement',
                'legal_guardian_signature',
                'legal_guardian_signature_ip',
            ]);
        });
    }
}
