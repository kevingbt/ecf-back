Ceci est la documentation de mon projet de back-end pour une mediathèque.

Afin de démarrer correctement et entièrement le back-end, il faut d'abord des pré-requis :

- Avoir doctrine sur sa machine
- Avoir un accès à phpMyAdmin ou tout autre SGBD

Ensuite il faut suivre ses différentes étapes :

- Ouvrir le projet GitHub sur VSCode
- Créer un fichier .env.local contenant ceci :
DATABASE_URL="[type de SGBD]://[nom utilisateur]:[mot de passe]@[lien SGBD]/mediatheque?serverVersion=[version du SGBD]&charset=utf8mb4"
Les informations entre crochet sont à remplacer par les informations de votre SGBD.

- Créer la base de données avec cette commande : "php bin/console doctrine:database:create" [cela va créer une base de données mediatheque, en lien avec le DATABASE_URL présent dans le fichier .env.local]
- Executer le fichier SQL "mediatheque.sql" dans votre SGBD afin d'ajouter les différentes tables et relations à la bdd mediatheque.
- Executer cette commande permettant l'ajout automatique de jeu de données : "php bin/console doctrine:fixtures:load"

Maintenant que votre base de données est en ligne et enrichi, vous pouvez démarrer le serveur via cette commande : "symfony serve".
Ainsi, votre base de données est enrichie de 10 livres, 5 abonnés et 3 emprunts.

Si vous désirez vous connecter sur le back-end, veuillez utiliser ces deux comptes :
- Administrateur :
    - email : admin@gmail.com
    - mot de passe : password
- Bibliothècaire :
    - email : biblio@gmail.com
    - mot de passe : password


Voici la liste des urls à votre disposition :
/login : pour se connecter
/register : pour se créer un compte
/logout : pour se déconnecter

Pour tous les urls relatives à la base de données qui suivent, vous devez être soit administrateur, soit bibliothècaire.
/livre : renvoie la liste des livres
/livre/new : renvoie un formulaire pour créer un nouveau livre
/livre/{id} : renvoie sur la page détail du livre ayant l'id
/livre/{id}/edit : renvoie un formulaire pour modifier le livre ayant l'id
/livre/{id}/delete : permet de supprimer le livre ayant l'id

/abonne : renvoie la liste des abonnés
/abonne/new : renvoie un formulaire pour créer un nouveau abonné
/abonne/{id} : renvoie sur la page détail de l'abonné ayant l'id
/abonne/{id}/edit : renvoie un formulaire pour modifier l'abonné ayant l'id
/abonne/{id}/delete : permet de supprimer l'abonné ayant l'id

/emprunt : renvoie la liste des emprunts
/emprunt/new : renvoie un formulaire pour créer un nouvel emprunt
/emprunt/{id} : renvoie sur la page détail de l'emprunt ayant l'id
/emprunt/{id}/edit : renvoie un formulaire pour modifier l'emprunt ayant l'id
/emprunt/{id}/delete : permet de supprimer l'emprunt ayant l'id

Si vous souhaitez retourner un livre, veuillez modifier l'emprunt correspondant en ajoutant la date de retour effective, le livre se mettra automatiquement en disponibilité.

Si vous souhaitez faire des appels API, vous aurez besoin d'être admin, auquel cas vous serez refusé.
Voici une liste non exhaustive d'appels API possible :
- /api/livres [GET] : renvoi la liste des livres
- /api/livres/{id} [GET]: renvoi le détail du livre ayant l'id numéro 2 (prendre alors l'id d'un livre existant, sinon message erreur)
- /api/livres [POST]: création d'un livre (sur Postman, respecter ceci: dans "body", cliquez sur "raw" et passer "text" en "json" puis utilisez ce brouillon de json :
{
    "titre": "[nom livre]",
    "auteur": "[auteur livre]",
    "isbn": [isbn livre],
    "date_publication": "[annee-mois-jour]",
    "disponible": [true or false]
})
- /api/livres/{id} [PUT] : permet de modifier le livre ayant l'id (Avoir le même body que sur la method POST, mais inclure uniquement les valeurs à modifier)
- /api/livres/{id} [DELETE] : permet de supprimer le livre ayant l'id


