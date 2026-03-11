<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('campuses', function (Blueprint $table) {
            $table->longText('tab_overview')->nullable()->after('description');
            $table->longText('tab_descriptions')->nullable()->after('tab_overview');
            $table->longText('tab_career')->nullable()->after('tab_descriptions');
            $table->longText('tab_summary')->nullable()->after('tab_career');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campuses', function (Blueprint $table) {
            $table->dropColumn(['tab_overview', 'tab_descriptions', 'tab_career', 'tab_summary']);
        });
    }
};
