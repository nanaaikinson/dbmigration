<?php

use Db\EloquentMigrationAdapter;
use Illuminate\Database\Schema\Blueprint;

final class CreateCategoriesTable extends EloquentMigrationAdapter
{
    public function up(): void
    {
        $this->schema->create('categories', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('shop_id');
            $table->string('slug');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->index('shop_id');
            $table->index(['slug', 'name']);

            $table->unique(['shop_id', 'name']);
            $table->unique(['shop_id', 'slug']);

            $table->foreign('shop_id')->references('id')->on('shops')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists('categories');
    }
}
