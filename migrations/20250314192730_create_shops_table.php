<?php

use Db\EloquentMigrationAdapter;
use Illuminate\Database\Schema\Blueprint;

final class CreateShopsTable extends EloquentMigrationAdapter
{
    public function up(): void
    {
        $this->schema->create('shops', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('user_id');
            $table->string('name');
            $table->string('domain')->unique();
            $table->string('bio')->nullable();
            $table->string('shop_key')->unique();
            $table->timestamps();

            $table->index('user_id');
            $table->index('domain');
            $table->index('shop_key');

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists('shops');
    }
}
