## PHP MIGRATIONS

## Installation

1. Clone project

```bash
git clone https://github.com/nanaaikinson/phpmigration.git
cd phpmigration
```

2. Install dependencies:

```bash
composer install
```

3. Set up environment variables:

```bash
cp .env.example .env
```

4. Edit `.env` with your database and other configurations (example):

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

5. To generate a migration file, run one of the following commands. A migration file will be created in migrations folder

```bash
# Using composer
composer migration:generate MigrationName

# Using phinx
./vendor/bin/phinx create MigrationName
```

6. Run database migrations. To apply migrations, run one the following commands

```bash
# Using composer
composer migration:migrate

# Using phinx
./vendor/bin/phinx migrate
```
