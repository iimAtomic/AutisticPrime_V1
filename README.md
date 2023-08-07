# Symfony_medica_app

Réalisateur : VEGBA Lux

Il s'agit d'un projet de boutique privée, le *Lux E-SHOP*. Les utilisateurs doivent se connecter pour y accéder.
Les technologies utilisées sont : Symfony, MySQL et PHP.
Le front est fait en HTML, CSS et Twig.

L'admin a directement accès à une interface lui permettant de gérer l'ajout, la suppression et la modification des produits présentés sur le front. Il peut aussi creer les comptes des utilisateurs car c'est une boutique privé.
Il peut également depuis le dashboard rejoindre la page du front où il y a le bouton dashboard inaccessible pour les simples utilisateurs. 
Il peut aussi se déconnecter à tout moment.

      Utilisateur Admin existant:
      Email : admin@gmail.com
      Mdp : admin

Le simple utilisateur a directement accès au front d'où il peut voir les produits proposés. 
Il peut également se déconnecter à tout moment.

      Utilisateur Client existant :
      Email : user@gmail.com
      Mdp : simpleUser

Pour deployer l'application il sera peut etre nécessaire ce faire un **composer install** 
Il faudra aussi probalement lancer un database create :  php bin/console doctrine:database:create
une migration  migrate : php bin/console doctrine:migrations:migrate

Merci ! 😤


![image](https://user-images.githubusercontent.com/71674056/229573967-566de9e8-bd12-4b41-a15f-f328b95f97af.png)
