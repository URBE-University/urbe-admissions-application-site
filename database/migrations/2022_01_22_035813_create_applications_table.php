<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->integer('step');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('prev_first_name')->nullable();
            $table->string('prev_middle_name')->nullable();
            $table->string('prev_last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('street')->nullable();
            $table->string('street_ext')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            // Personal Information
            $table->string('ethnicity')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('ssn')->nullable();
            $table->boolean('us_resident')->default(0);
            $table->string('dl_passport')->nullable();
            $table->boolean('military')->default(0);
            $table->boolean('military_civilian')->default(0);
            // Program details
            $table->date('start_date')->nullable();
            $table->string('degree')->nullable();
            $table->string('program')->nullable();
            $table->string('concentration')->nullable();
            $table->string('program_format')->nullable();
            $table->string('program_language')->nullable();
            $table->string('education_level')->nullable();
            // Highschool details
            $table->string('hs_name')->nullable();
            $table->string('hs_city')->nullable();
            $table->string('hs_country')->nullable();
            $table->date('hs_completion_date')->nullable();
            // Post-secondary school details
            $table->string('ps_school_name')->nullable();
            $table->string('ps_school_city')->nullable();
            $table->string('ps_school_country')->nullable();
            $table->string('degree_earned')->nullable();
            // Employment details
            $table->string('employer_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('resume_url')->nullable();
            // Document details
            $table->string('official_transcripts_url')->nullable();
            $table->string('hs_bs_diploma_url')->nullable(); // highschool or undergrad diplomas
            $table->string('id_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
