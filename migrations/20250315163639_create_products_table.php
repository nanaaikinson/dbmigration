<?php

use Db\EloquentMigrationAdapter;
use Illuminate\Database\Schema\Blueprint;

final class CreateProductsTable extends EloquentMigrationAdapter
{
    public function up(): void
    {
        $this->schema->create('products', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('shop_id');
            $table->string('slug');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('price')->default(0);
            $table->unsignedBigInteger('discounted_price')->default(0);
            $table->unsignedInteger('quantity')->default(0);
            $table->enum('stock_status', ['IN_STOCK', 'OUT_OF_STOCK', 'LIMITED']);
            $table->boolean('enabled')->default(true);
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
        $this->schema->dropIfExists('products');
    }
}
