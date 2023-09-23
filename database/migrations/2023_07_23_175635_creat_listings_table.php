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
        //--making a migration code: 'php artisan make:migration migrationName'
        //--migration is for making the database authomatically:
        //--after adding the table and columns we should run the code 'php artisan migrate' to be added to the table
        //--to delete the content in migration, the code is: 'php artisan migrate refresh'
        //--to delete the content in migration and make fake users together, the code is: 'php artisan migrate refresh --seed'
        //--here the name of the table should be plural of the name of the model
        // for linking the storage to public: php artisan storage:link
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            //cascade means if we delete a user, all the listings that he made will be deleted as well
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('logo')->nullable();
            $table->string('tags');
            $table->string('company');
            $table->string('location');
            $table->string('email');
            $table->string('website');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listingsTable');
    }
};
