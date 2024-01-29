<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email',200)->unique();
            $table->string('login',200)->unique();
            $table->string('password',100);
            $table->enum('authentication', ['LOCAL', 'SSO'])->default('SSO');
            $table->string('photo',250)->nullable();
            $table->bigInteger('run')->unique();
            $table->char('dv');
            $table->string('first_name',70);
            $table->string('last_name_pathernal',70);
            $table->string('last_name_maternal',70)->nullable();
            $table->enum('sex', ['F', 'M','X'])->default('F');
            $table->date('birthdate')->nullable();
            $table->enum('activate', ['0','1'])->default('1');
            $table->string('auth_two_factor',10)->nullable();
            $table->foreignIdFor(\App\Models\NationalCode::class)->constrained();
            $table->foreignIdFor(\App\Models\AcademicUnit::class)->constrained();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
