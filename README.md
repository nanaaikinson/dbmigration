# DB MIGRATION

DB Migration is a standalone project for handling database migrations using PHP. It provides a simple and flexible way to version and manage your database schema changes in a consistent manner.

## Features

- **Database Migration Management**: Easily create, apply, and roll back database migrations.
- **Simple Command-Line Interface**: Use Phinx’s powerful CLI to manage your migrations.
- **Uses Laravel's Illuminate Database**: Leverages Laravel's database features to interact with your database, offering a more robust and feature-rich experience for managing migrations.

## Requirements

- PHP >= 8.1
- Composer
- MySQL (or other databases supported by Phinx)

## Installation

### 1. Clone project

```bash
git clone https://github.com/nanaaikinson/phpmigration.git
cd phpmigration
```

### 2. Install dependencies:

```bash
composer install
```

### 3. Set up environment variables:

```bash
cp .env.example .env
```

### 4. Edit `.env` with your database and other configurations (example):

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 5. To generate a migration file, run the following command. A migration file will be created in migrations folder

```bash
composer migration:create MigrationName
```

### 6. Run database migrations. To apply migrations, run the following command

For more info
<a href="https://book.cakephp.org/phinx/0/en/commands.html#the-create-command">https://book.cakephp.org/phinx/0/en/commands.html#the-create-command</a>

```bash
composer migration:migrate
```

### 7. To rollback, run the following command

For more info
<a href="https://book.cakephp.org/phinx/0/en/commands.html#the-rollback-command">https://book.cakephp.org/phinx/0/en/commands.html#the-rollback-command</a>

```bash
composer migration:rollback
```
