# Instal PHP Unit with composer

```bash
composer require --dev phpunit/phpunit ^10
```

Run your first test
```bash
./vendor/bin/phpunit tests
```

Créer une base de donnée temporaire avec mySQL si besoin
```bash
docker run --name some-mysql -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=test_db -p 3307:3306 -d mysql
```

Créer les tables nécessaires en base de données
```bash
php migration.php
```

Try to write test for Authentification.php Class
