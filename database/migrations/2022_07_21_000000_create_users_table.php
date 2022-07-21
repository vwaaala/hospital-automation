<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Such as Dr. Mr. Mrs.');
            $table->string('name')->comment('Full name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gender')->comment('m = male, f = female, o = other');
            $table->date('dob');
            $table->integer('religion')->nullable()->comment('1 = muslim, 2 = Hindu, 3 = Christian, 4 = Buddism');
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->rememberToken();
            $table->foreignId('created_by_id')->nullable()->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('updated_by_id')->nullable()->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('users');
    }
}
