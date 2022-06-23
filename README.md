<p align="center">
    <img src="https://img.shields.io/badge/version-1.1-%230193db"/>
</p>

## À propos
<p>
Ceci est un quiz qui a était créer dans le but de tester mes capacités en VueJs
</p>

## Prérequis
- git >= 2.0
- composer >= 2.0
- php >= 8.0
- npm >= 8.3

## Installation

Clonage du repo
```bash
git clone https://github.com/NoualAli/quiz
```
Installation des dépendences laravel
```bash
composer install
```

Installtion et compilation des dépendences javascript et css
```bash
npm install && npm run dev
```

Migration des tables de la base de données + peuplement <br/>
```bash
php artisan migrate --seed
```
**Note: la documentation assume que vous avez déjà une base de données créée et fonctionnelle**

Lancement du serveur interne de php
```bash
php artisan serve
```
