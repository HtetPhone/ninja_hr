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
        Schema::table('users', function (Blueprint $table) {
            $table->string('employee_id')->nullable()->after('password');
            $table->string('phone_no')->nullable()->after('employee_id');
            $table->string('nrc_no')->nullable()->after('phone_no');
            $table->date('birthday')->nullable()->after('nrc_no');
            $table->enum('gender', ['male', 'female', 'other'])->nullable()->after('birthday');
            $table->text('address')->nullable()->after('gender');
            $table->bigInteger('department_id')->nullable()->after('address');
            $table->date('date_of_join')->nullable()->after('department_id');
            $table->boolean('is_present')->default(true)->after('date_of_join');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone_no', 
                'nrc_no', 
                'birthday', 
                'gender', 
                'address', 
                'employee_id',
                'department_id',
                'date_of_join',
                'is_present'
            ]);
        });
    }
};
