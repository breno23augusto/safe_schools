<?php

use App\Models\Organization;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable();
            $table->foreignIdFor(Organization::class)->nullable();
            $table->foreignIdFor(School::class);
            $table->text('description');
            $table->enum('classification', ['azul', 'verde', 'amarelo', 'laranja', 'vermelho'])->nullable();

            $table->timestamps();

            $table->index('user_id');
            $table->index('organization_id');
            $table->index('school_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
