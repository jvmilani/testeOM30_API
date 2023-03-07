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
        Schema::create('patients', function (Blueprint $table) {
            $table->increments("id");
            $table->string("Photo");
            $table->string("Name");
            $table->string("motherName");
            $table->date("BirthDay");
            $table->string("CPF")->unique();
            $table->string("CNS")->unique();
            $table->timestamps();
        });
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments("id");
            $table->string("CEP");
            $table->string("Address");
            $table->string("Number");
            $table->string("Complement");
            $table->string("Neighborhood");
            $table->string("City");
            $table->string("State");
            $table->foreignId("patient_id")
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
        Schema::dropIfExists('addresses');
    }
};
