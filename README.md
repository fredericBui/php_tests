# 🧪 Tests avec PHPUnit

## ✅ Prérequis

Avant de commencer, assurez-vous d’avoir les éléments suivants installés sur votre machine :

- PHP
- [Composer](https://getcomposer.org/)
- mySQL ou [Docker](https://www.docker.com/) (facultatif, pour la base de données)

---

## 📦 Installation de PHPUnit

Installez PHPUnit en tant que dépendance de développement avec Composer :

```bash
composer require --dev phpunit/phpunit ^10
```

🚀 Lancer les tests
Pour exécuter vos tests unitaires :

```bash
./vendor/bin/phpunit tests
```

## 🐬 Base de données temporaire (facultatif)
Si vos tests nécessitent une base de données, vous pouvez lancer une instance MySQL avec Docker :

```bash
docker run --name some-mysql \
  -e MYSQL_ROOT_PASSWORD=root \
  -e MYSQL_DATABASE=test_db \
  -p 3307:3306 \
  -d mysql
```

## 🛠️ Initialiser les tables
Une fois la base lancée, exécutez votre script de migration pour créer les tables nécessaires :

```bash
php migration.php
```

## 🧪 Écriture des tests
Classe Authentification.php
➤ Écrivez des tests unitaires pour cette classe.

Classe UserRepository.php
➤ Écrivez des tests d’intégration pour vérifier l’interaction avec la base de données.

