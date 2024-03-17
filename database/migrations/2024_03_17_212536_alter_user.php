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
            $table->text('identificacion',50)
                ->after('id')
                ->nullable();

            $table->text('lastname',50)
                ->after('name')
                ->nullable();
            
            $table->text('telefeno',50)
            ->after('email')
            ->nullable();

            $table->text('rol',2)
            ->after('profile_photo_path')
            ->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
