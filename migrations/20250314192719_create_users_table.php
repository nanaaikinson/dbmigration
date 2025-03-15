<?php

use Db\EloquentMigrationAdapter;
use Illuminate\Database\Schema\Blueprint;

final class CreateUsersTable extends EloquentMigrationAdapter
{
    public function up(): void
    {
        $this->schema->create('users', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists('users');
    }
}
