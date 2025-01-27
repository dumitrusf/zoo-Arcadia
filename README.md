## Système de gestion du zoo arcadia

Un système pour gérer les animaux, les habitats, la nutrition et les rapports dans les zoos.

Conçu avec une approche moderne de PHP et MariaDB.

[Documentation du projet](https://github.com/dumitrusf/zoo-arcadia/wiki) · [Signaler une erreur](https://github.com/dumitrusf/zoo-arcadia/issues) · [Suggérer une fonctionnalité](https://github.com/dumitrusf/zoo-arcadia/issues)

- [Système de gestion du zoo d'Arcadia](#système-de-gestion-zoo-arcadia)
- [Caractéristiques principales](#Caractéristiques-principales)
  - [Captures d'écran](#captures-d'écran)
- [Pour commencer](#pour-commencer)
  - [Pré-requis](#prerequisitos)
  - [Installation](#instalación)
- [Contribuer au projet](#contribuer-au-projet)
- [Stack technologique](#stack-technologique)
- [Licence](#licence)

## Caractéristiques principales

- **Gestion des animaux**: Enregistrement de données d'animaux, nutrition, état de santé et habitats.
- **Rôles des utilisateurs**: Gère différents rôles tels que les vétérinaires, les administrateurs et les employés.
- **Conception responsive**: Interface amigable basée sur mobile first.
- **Logs alimentaires et rapports**: Alimentation et rapports de santé pour chaque animal.

### Captures d'écran


![home](https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!261527&authkey=!AIVvtn2jueg-iSM&ithint=photo&e=TwLXIR)


## Pour commencer

### Pré-requis

- **Apache**: Serveur Web installé dans `C:/apache`.
- **PHP**: Version compatible installée dans `C:/php`.
- **Node.js**: Pour gérer les dépendances de frontend.
- **MariaDB**: Pour la base de données relationnelle.
- **MongoDB**: Pour la base de données NO relationnelle.

### Installation

1. **Cloner le repository**:

   ```bash
   git clone https://github.com/dumitrusf/zoo-arcadia.git
   cd zoo-arcadia
   ```

2. **Configurer Apache**:

   - [Clona el repositorio](https://github.com/dumitrusf/php-apache-for-arcadia.git) ou téléchargez les fichiers à partir de sa source d'origine

   - déplacer php et apache au C:\    

   - Modifier le fichier `httpd.conf`:
     ```apache
     DocumentRoot "C:/apache/htdocs/zoo-arcadia/public"
     <Directory "C:/apache/htdocs/zoo-arcadia/public">
         AllowOverride All
         Require all granted
     </Directory>
     ```

3. **Configurer PHP**:

   - Éditer `php.ini` pour permettre les extensions nécessaires:
     ```ini
     extension=mysqli
     extension=pdo_mysql
     ```

4. **Créer une base de données**:

   - Utilisez des scripts SQL dans le dossier `databases/` pour configurer les tables et les données initiales:
     ```bash
     mysql -u root -p zoo_arcadia < database/2025_01_19_tables.sql
     mysql -u root -p zoo_arcadia < database/2025_01_19_constraints.sql
     mysql -u root -p zoo_arcadia < database/2025_01_19_init.sql
     ```

5. **Installer dépendances frontend**:

   ```bash
   npm install
   ```

6. **Démarrer le serveur**:

   (Grace au fichier créé gulp.js)

   ```bash
   npm run css
   ```

## Contribuer au projet

Les contributions sont bienvenues.

Suivez ces étapes:

1. Faire une *[fork](https://github.com/dumitrusf/zoo-arcadia/fork)*.

2. Cloner le "fork":
   ```bash
   git clone https://github.com/tu-usuario/zoo-arcadia.git
   ```
3. Créez une branche pour vos modifications:
   ```bash
   git checkout -b feature/new-functionality
   ```
4. Faites vos modifications et faites commit:
   ```bash
   git commit -m "feat: add new functionality"
   ```
5. Faites vos "push" vers votre branche:
   ```bash
   git push origin feature/new-functionality
   ```
6. Ouvrir un *[pull request](https://github.com/dumitrusf/zoo-arcadia/pulls)*.

## Stack Technologique

- **PHP**: Pour la logique du serveur.
- **MariaDB/MongoDB**: Base de données relationnelle/non relationnelle.
- **Bootstrap**: Framework CSS pour des styles plus complexes et JS.
- **SCSS**: Pour une nidification plus organisée de CSS. 
- **Node.js y Gulp**: Automatisation et gestion des dépendances frontend.

## Licence

Distribué sous la licence MIT. Consultez `LICENSE` pour plus d'informations.

