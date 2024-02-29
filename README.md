# Application Web de Covoiturage

Ce projet est une application web de covoiturage conçue pour réduire la congestion routière et l'impact environnemental des voitures personnelles. En utilisant cette plateforme, les utilisateurs peuvent partager les trajets et les coûts associés à l'utilisation des voitures.

## Acteurs du système

- Passager
- Conducteur
- User
- Admin
- Système de gestion des permis et des cartes grises
- Application de paiement

## Fonctionnalités

- **Passager** : Recherche de trajet, réservation de place, consultation et gestion de réservation.
- **Conducteur** : Proposition de trajet, consultation de trajets et factures, gestion de réservations.
- **Utilisateur (User)** : Inscription, gestion de profil, feedback.
- **Administrateur (Admin)** : Gestion des inscriptions, réservations, feedbacks, utilisateurs et taux de gain.
- Intégration avec Google Maps pour le traçage des itinéraires.
- Système de paiement intégré pour la gestion financière.
- Système de vérification des pièces d'identité pour la sécurité et l'authentification.

## Technologie

L'application est développée avec le framework Laravel 8, utilisant Blade.php, HTML, JavaScript, et CSS. Le projet contient également une base de données gérée via phpMyAdmin et XAMPP.

## Prérequis

- PHP 7.4 ou supérieur
- Laravel 8
- MySQL
- Composer
- npm

## Installation

1. Clonez le dépôt sur votre machine locale.
2. Installez les dépendances avec `composer install`.
3. Installez les dépendances front-end avec `npm install` et `npm run dev`.
4. Configurez votre base de données dans le fichier `.env`.
5. Migrez la base de données avec `php artisan migrate`.
6. Lancez le serveur de développement avec `php artisan serve`.

## Structure du projet

- `UI-UX-QuickLook/` - Contient les maquettes de l'interface utilisateur pour un aperçu rapide.
- `myapp/` - Contient l'ensemble du projet, y compris les vues, les modèles et les contrôleurs.
- Base de données - Gérée via phpMyAdmin.

## Contributeurs
- ABDELKADIR Sellahi
