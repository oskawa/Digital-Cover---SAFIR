
# Digital Cover - SAFIR

Bonjour l'équipe de Digital Cover, vous trouverez sur ce répertoire Github, mon test de création de landing page à partir de votre maquette Safir
J'ai pris beaucoup de plaisir à la construire et j'espère que vous apprécierez également.

Mon process de travail est disponible à la suite de ce readme, je vous souhaite donc une agréable lecture, je reste à votre disposition au besoin.

Pour vous expliquer ma manière de travailler, je vous emmène avec moi dans un parcours chronologique de travail, réparti sur 7h.

TL:TR Vous voulez un résumé ?
- 1h : Création des blocs, champs ACF et remplissage avec les données de la maquette
- 1h : Mise en forme globale seulement en HTML pour avoir une structure la plus propre possible
- 3h : Stylisation 
- 1h30 : Responsive et vérification des différents devices
- 30min : Ecrit de ce readme ! 



**Vous souhaitez voir le projet ?**

Lien du site : https://safir.maxime-eloir.fr/


**Vous souhaitez installer le projet ?**

Il y a un lien, fourni dans le mail, il s'agit d'une exportation réalisée avec duplicator, mettez la à la racine de votre projet, connectez vous à votre BDD et le tour est joué ! 
Egalement, si vous utilisez local by flywheel, vous pouvez installé le projet en important le dossier digital-safir.zip, également trouvable dans un lien mis à disposition dans le mail.



## Chronologie de travail
### Installation et base HTML - 2h00


Pour créer mon wordpress en local, j'utilise le logiciel *Local By Flywheel*, qui permet de faire une installation propre de wordpress, d'installer un certificat ssl et d'avoir une URL modifiée en .local.
J'ai créé il y a quelques mois un blueprint que je reprends à chaque début de projet : il intègre les plugins indispensables : ACF et Yoast par exemple, et permet également d'aller beaucoup plus vite au démarrage d'un projet grâce à toutes les petites implémentations d'optimisation mis en place.

Le site installé, j'ai mis en place les blocs acf depuis un fichier JSON, me permettant de la parcourir avec une boucle en PHP pour ensuite en extraire les informations. J'ai également réalisé des screenshots pour avoir un visuel dans l'éditeur de blocs de Wordpress et j'ai créé les champs en réfléchissant bien au caractère réutilisable et maléable des blocs : Fonds de couleurs, tailles des textes, titrage ou non, ect.
- Enregistrement de styles/scripts utiles [^1]
- Enregistrement de menu dans le functions.php
- Enregistrement des blocs ACF
- Création des champs ACF et remplissage des informations
- Création des fichiers acf-block et mise en place de l'architecture HTML


[^1]: Pour permettre une plus grande flexibilité et rapidité dans mon travail, j'utilise la grille Bootstrap comme grille de référence.  De bootstrap, je n'utilise que le colonnage car je préfère gérer au maximum mon CSS, notamment avec la méthodologie BEM cité quelques lignes plus bas.


###  CSS - 3h
La structure HTML et mes éléments configurés, il ne fallait plus que faire le CSS ! 

J'ai passé la journée à travailler sur le CSS de mes blocks, l'architecture ayant été mis en place la veille, je ne devais plus qu'intégrer le style.

- Pour mon HTML/CSS, j'ai utilisé la méthodologie BEM ( Block Element Modifier ), cela me permet de cibler correctement mes balises mais surtout, si je décide de transformer un h3 en h4, cela n'aura pas d'impact sur mon code car j'utilise mes classes pour styliser mes éléments.
- J'utilise depuis peu une seconde feuille de style bien disctincte de la première pour gérer tout mon responsive, cela me permet d'être plus efficace lors des phases de recettage!

J'y ai ajouté de légères animations sur les svg, sur les boutons, et j'ai également géré des transitions et des animations pour le menu et quelques effets de hover.

Mon travail en CSS fait, il m'a fallu ensuite vérifier la version mobile : 
- Diminution de quelques tailles d'images et de texte
- Changement de l'ordre des éléments pour faire passer l'image avant le texte
- Centrage des éléments du footer
- Mise en place d'un menu Hamburger


Une fois tout cela fait, voilà maintenant 1h que j'écris ce README, tentant d'être le plus clair possible.
J'ai créé un sous-somaine et une redirection pour que vous puissiez voir le site dans les meilleures conditions.

## Points d'amélioration


Dans l'ensemble, je pense que je ferais des animations personnalisés, un loader au chargement de la page, des animations plus poussés sur certains éléments interactifs...

- Pour permettre une entrée dans l'ère moderne et l'utilisation du modèle MVC, j'aurais pu utiliser Bedrock et Timber, utilisant les variables twig.
- Venir diviser ma page functions.php en plus petit fichier pour mieux s'y retrouver.
- Optimiser les fonctions dans le functions.php
- Rajouter des animations plus intéressantes au scroll



# Merci d'avoir lu jusqu'ici.

Maxime Eloir
maxime.eloir@gmail.com
www.maxime-eloir.fr
