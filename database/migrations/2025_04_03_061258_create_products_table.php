<?php

use App\Models\User;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 2000);
            $table->string('slug', 2000);
            $table->longText('description');

            $table->foreignId('department_id')
                ->index()
                ->constrained('departments')
                ->cascadeOnDelete(); // Ensures deletion consistency

            $table->foreignId('category_id')
                ->index()
                ->constrained('categories')
                ->cascadeOnDelete();

            $table->decimal('price', 20, 4);
            $table->string('status')->index();
            $table->integer('quantity')->nullable();

            $table->foreignIdFor(User::class, 'created_by')->constrained('users')->cascadeOnDelete();
            $table->foreignIdFor(User::class, 'updated_by')->constrained('users')->cascadeOnDelete();

            $table->timestamps(); // Creates created_at and updated_at
            $table->softDeletes(); // Replaces incorrect timestamps('deleted_at')
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
