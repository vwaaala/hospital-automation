<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no')->nullable();
            $table->date('registration_date')->nullable();
            $table->string('referral')->nullable()->comment('1 = Yes, 2 = No');
            $table->string('referred_by')->nullable();
            $table->integer('patient_type')->nullable()->comment('1 = Inpatient, 2 = Outpatient');
            $table->integer('title')->nullable()->comment('Mr. Mrs. Sir. Etc.');
            $table->string('name')->nullable()->fulltext()->comment('full name of the patient');
            $table->date('dob')->nullable()->comment('numbers only');
            $table->integer('age')->nullable()->comment('numbers only');
            $table->string('gender')->nullable()->comment('M = Male, F = Female');
            $table->string('marital_status')->nullable()->comment('S = Single, D = Divorce, M = Married');
            $table->string('blood_group')->nullable();
            $table->string('email')->nullable()->comment('because one email can be use for multiple patient from the same house');
            $table->string('phone')->nullable()->comment('because one phone number can be use for multiple patient from the same house');
            $table->integer('religion')->nullable();
            $table->integer('occupation')->nullable()->comment('student, farmer, etc.');
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();

            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();

            // Payment Method
            $table->string('payment_method')->default(1)->comment('1 = Cash');

            $table->text('symptoms')->nullable();
            $table->string('image')->nullable();

            $table->foreignIdFor(User::class)->nullable()->constrained()->comment('the user_id is the Doctor id in this table');
            $table->foreignId('created_by_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('updated_by_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('patients');
    }
};
