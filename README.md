# SecuriteRx
- Le dossier contient un dossier 'dataBase' où se trouve la base de données.
- le projet a été réalisé en utilisant xampp, le lien pour accéder à la première page qui permet de naviguer entre les pages est : http://localhost/SecuriteRx/script/sign.php
- le formulaire impose à l'utilisateur un format de mot de passe plus sécurisé, le script utilise des fonctions qui empêche les injections de code malveillant et utilise les requêtes préparés, un captcha a été mit en place et l'inscription ne se fait pas si le captcha n'est pas validé.
- Le logo est protégé contre les attaques de type Cross-Site Scripting (XSS) en utilisant la fonction htmlspecialchars() 