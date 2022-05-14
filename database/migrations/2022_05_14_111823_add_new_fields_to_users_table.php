<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('confirm_password')->after('password');
            $table->string('contact_number')->nullable()->after('confirm_password');
            $table->string('gender')->nullable()->after('contact_number');
            $table->string('address')->nullable()->after('gender');
            $table->dateTime('birthday')->nullable()->after('address');
            $table->integer('weight')->nullable()->after('birthday');
            $table->integer('height')->nullable()->after('weight');
            $table->string('description')->nullable()->after('height');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('confirm_password');
            $table->dropColumn('contact_number');
            $table->dropColumn('gender');
            $table->dropColumn('address');
            $table->dropColumn('birthday');
            $table->dropColumn('weight');
            $table->dropColumn('height');
            $table->dropColumn('description');
        });
    }
}
