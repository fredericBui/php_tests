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

## 🛠️ Initialiser les tables
Une fois la base lancée, exécutez votre script de migration pour créer les tables nécessaires :

```bash
php migration.php
```

## 🧪 Écriture des tests
Classe Authentification.php (pas de base de données mot de passe en dur)

➤ Écrivez des tests unitaires pour cette classe.

| Cas de test                                    | Entrée                       | Résultat attendu                       |
|------------------------------------------------|------------------------------|--------------------------------------|
| Connexion réussie avec identifiants valides    | username: "admin", password: "password" | Retourne `true`                       |
| Connexion échouée avec nom d’utilisateur incorrect | username: "user", password: "password"  | Retourne `false`                      |
| Connexion échouée avec mot de passe incorrect  | username: "admin", password: "wrong"    | Retourne `false`                      |
| Connexion échouée avec identifiants vides      | username: "", password: ""               | Retourne `false`                      |


Classe UserRepository.php

➤ Écrivez des tests d’intégration pour vérifier l’interaction avec la base de données.

| Cas de test                                    | Entrée                              | Résultat attendu                                  |
|------------------------------------------------|-------------------------------------|--------------------------------------------------|
| Création d’un nouvel utilisateur                | email: "test@example.com", password: "secret" | L’utilisateur est ajouté en base avec mot de passe haché |
| Recherche d’un utilisateur existant par email  | email: "test@example.com"           | Retourne un tableau associatif avec les données utilisateur (email + password haché) |
| Recherche d’un utilisateur inexistant           | email: "inexistant@example.com"    | Retourne `null`                                   |
| Mot de passe stocké est haché                    | Après création utilisateur          | Le champ `password` est une chaîne hachée (non égale au mot de passe en clair) |

Classe UserRepository.php + Mailer.php

➤ Écrivez un test end-to-end (fonctionnel) pour tester un scénario utilisateur complet

Installer php mailer pour envoyer des mails
```bash
composer require phpmailer/phpmailer
```
Créer un compte sur mailtrap

| Test / Étape                                   | Entrée / Action                             | Résultat attendu                                          |
|------------------------------------------------|--------------------------------------------|-----------------------------------------------------------|
| Création d’un compte utilisateur valide          | Appeler `UserRepository::createUser` avec un email et un mot de passe en clair | L’utilisateur est ajouté en base avec un mot de passe haché |
| Envoi du mail de confirmation                     | Appeler `Mailer::sendConfirmation` avec l’email de l’utilisateur | Le mail est envoyé avec le sujet « Confirmation de votre inscription », le corps attendu et la fonction retourne `true` indiquant un envoi réussi |
             