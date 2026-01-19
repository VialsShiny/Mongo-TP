# Mongo-TP

Bienvenue sur **Mongo-TP** – un projet MVC complet utilisant **MongoDB** pour la base de données et **Twig** pour les templates.  
Ce projet sert de TP ou de starter pour un blog avec authentification, création d’articles et gestion de commentaires.

> **"Kickstart your MongoDB + PHP project with style and efficiency!"**

---

## 🚀 Caractéristiques

-   **Architecture MVC Complète** : Modèles, vues et contrôleurs bien séparés.
-   **MongoDB Intégré** : Stockage des articles et utilisateurs.
-   **Twig pour les Templates** : Templates modernes et flexibles.
-   **Layouts Modernes** : Design simple et épuré avec Tailwind CSS.
-   **Routing Basique et Flexible** : Gestion centralisée des routes.
-   **Authentification** : Connexion, inscription et déconnexion.
-   **Gestion des Articles** : Création et affichage d’articles avec commentaires.

---

## ⚙️ Installation

1. **Cloner le repository :**

```bash
git clone https://github.com/VialsShiny/Mongo-TP.git
cd Mongo-TP
```

2. **Installer les dépendances avec Composer :**

```bash
composer install
```

3. **Configuration**

-   Copie le fichier `.env.example` en `.env` et configure les paramètres de connexion à MongoDB.
-   Configure ton serveur web (Apache, Nginx, PHP Built-in server) pour pointer vers le dossier `public`.

4. **Importer les données MongoDB**

-   Dans MongoDB, crée une base de données et importes les collections `users` et `blogs` depuis les fichiers JSON fournis (`users.json` et `blogs.json`).

Exemple avec `mongoimport` :

```bash
mongoimport --db mongo-tp --collection users --file users.json --jsonArray
mongoimport --db mongo-tp --collection blogs --file blogs.json --jsonArray
```

5. **Lancer le serveur PHP intégré**

```bash
php -S localhost:8000 -t public
```

Puis ouvre ton navigateur sur `http://localhost:8000`.

---

## 🧑‍💻 Utilisateurs par défaut

| Nom              | Email                                                           | Mot de passe |
| ---------------- | --------------------------------------------------------------- | ------------ |
| Patrick Dupont   | [patrick.dupont@example.com](mailto:patrick.dupont@example.com) | password123  |
| Alice Martin     | [alice.martin@example.com](mailto:alice.martin@example.com)     | password123  |
| Jean Bernard     | [jean.bernard@example.com](mailto:jean.bernard@example.com)     | password123  |
| Test Utilisateur | [test@test.test](mailto:test@test.test)                         | testtesttest |
| Admin Test       | [test.admin@test.test](mailto:test.admin@test.test)             | testtesttest |
| Thomas Leroy     | [thomas.leroy@example.com](mailto:thomas.leroy@example.com)     | azerty123    |

> Ces mots de passe sont uniquement pour le développement. En production, change-les immédiatement.

---

## 🛠 Utilisation

-   **Modèles (`/src/Models`)** : Contiennent la logique métier (Blog, Author, etc.).
-   **Contrôleurs (`/src/Controllers`)** : Gèrent les routes et actions utilisateurs.
-   **Vues (`/views`)** : Templates Twig pour l’affichage.
-   **Navigation** : Connexion, inscription, création d’articles et déconnexion.

Les routes sont définies dans le routeur principal. Tu peux ajouter de nouvelles routes et fonctionnalités selon tes besoins.

---

## 📌 Notes

-   Les mots de passe dans les JSON sont hashés avec bcrypt pour la sécurité.
-   Ce projet est conçu pour être un **starter pour un blog PHP + MongoDB**.
