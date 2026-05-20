Ceci est la documentation de mon projet de back-end pour une mediathèque.

Afin de démarrer correctement et entièrement le back-end, il faut d'abord des pré-requis :
- Avoir doctrine sur sa machine
- Avoir un accès à phpMyAdmin ou tout autre SGBD
Ensuite il faut suivre ses différentes étapes :
- Ouvrir le projet GitHub sur VSCode
- Créer la base de données avec cette commande : "php bin/console doctrine:database:create" [cela va créer une base de données mediatheque]
- Executer le fichier SQL "mediatheque.sql" afin d'ajouter les différentes tables et relations à la bdd
- Executer cette commande permettant l'ajout de jeu de données : "php bin/console doctrine:fixtures:load"
Maintenant que votre base de données est en ligne et enrichi, vous pouvez démarrer le serveur via cette commande : "symfony serve".

Si vous désirez vous connecter sur le back-end, veuillez utiliser ces deux comptes :
- Administrateur :
    - email : admin@gmail.com
    - mot de passe : password
- Bibliothècaire :
    - email : biblio@gmail.com
    - mot de passe : password
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
- /api/livres/{id} : permet de modifier le livre ayant l'id (Avoir le même body que sur la method POST, mais inclure uniquement les valeurs à modifier)
- /api/livres/{id} : permet de supprimer le livre ayant l'id


