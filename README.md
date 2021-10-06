# Evaluation_Forum
Création d'un forum.

Le forum doit contenir :

Des catégories -> Contiendra des sujets.
Des sujets -> Contiendra un descriptif.
Des commentaires ->  Peuvent rester simples.
Un espace de connexion / création de compte avec vérification de l'adresse mail (envoi d'un mail avec un token - lien sur lequel cliquer pour valider son adresse mail)


Créez un système d'authentification avec les rôles :

Admin => Devra pouvoir créer / supprimer / modifier / archiver TOUT (il n'existe qu'un seul compte admin impossible d'attribuer ce rôle)
Utilisateur => Pourra créer des sujets / des commentaires, ainsi que modifier ses propres sujets / commentaires + modifier son profil.
Modérateur => Devra pouvoir créer / modifier / archiver (clôturer) TOUT SAUF les catégories

Une catégorie pourra être :

Créée -> Une description courte de la catégorie devra être affichée.
Supprimée -> Entraînera la suppression de tous les sujets contenus dans cette catégorie, ainsi que de tous les commentaires.
Archivée -> Les sujets ne seront accessibles qu'en lecture seule, plus d'édition ou de commentaires acceptés (plus moyen de modifier quoi que ce soit, même le modo, SAUF l'admin).
La description pourra être éditée -> L'administrateur du site (uniquement) pourra modifier la description de la catégorie.

Un sujet pourra être:

Créé -> Contient un titre, un contenu texte pour décrire la problématique
Supprimé
clôturé
Modifié
Modéré -> Quand la modification est faite par l'admin ou le modérateur (modification par quelqu'un d'autre que l'utilisateur ayant rédigé)

Un commentaire pourra être

Créé -> Contenu uniquement (si vous souhaitez un titre aux commentaires, utilisez les X premiers caractères du commentaire)
Supprimé
Clôturé
Modifié
Modéré
Signalé (en bonus)


Attention à bien gérer les différentes autorisations pour les utilisateurs. On ne veut pas que n’importe qui puisse supprimer n’importe quel message.

