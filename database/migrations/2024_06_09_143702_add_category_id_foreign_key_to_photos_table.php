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
        Schema::table('photos', function (Blueprint $table) {

            //create the column that will hold the a foreign key
            $table->unsignedBigInteger('category_id')->nullable()->after('id');

            //Assign the foreign key to the column created above
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('photos', function (Blueprint $table) {

            //Drop the foreign key
            $table->dropForeign('photos_category_id_foreign');

            //Drop the column
            $table->dropColumn('category_id');
        });
    }
};
