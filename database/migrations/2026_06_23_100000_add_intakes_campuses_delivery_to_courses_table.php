<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('intakes')->nullable()->after('fee');
            $table->string('campuses')->nullable()->after('intakes');
            $table->string('delivery')->nullable()->after('campuses');
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['intakes', 'campuses', 'delivery']);
        });
    }
};
