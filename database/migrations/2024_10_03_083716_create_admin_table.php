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
        Schema::create('admin', function (Blueprint $table) {
            $table->integer('user_id')->primary();  // Equivalent to NOT NULL and PRIMARY KEY
            $table->string('username', 50)->charset('utf8')->collation('utf8_general_ci');
            $table->string('password', 255)->charset('utf8')->collation('utf8_general_ci');
            $table->string('name', 50)->charset('utf8')->collation('utf8_general_ci');
            $table->integer('fac_id')->default(0);  // NOT NULL with DEFAULT value
            $table->integer('scholar_id')->default(0);  // NOT NULL with DEFAULT value
            $table->text('modules')->nullable();  // Text column with NULL as default

            // Optionally, you can define engine and charset as well
            $table->engine = 'InnoDB';
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->dropColumn(['username', 'password', 'name', 'fac_id', 'scholar_id', 'modules']);
        });
    }
};
