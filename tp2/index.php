<?php
include ('../header.php');
// je stocke dans la variable '$patternName' ma regex pour les noms !
$patternName = '%^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$%';
$patternAge = '%^[0-9]{0,2}$%';
//FINIR REGEX SOCIETE ---------------------------------------------------------------------------------
// je créé un tableau qui va contenir mes erreurs.
$formErrors = array();

// On vérifie le nombre de lignes dans le tableau POST qui contient toutes les données saisies dans le formulaire.
if (count($_POST) > 0) {
    if (!empty($_POST['title'])) {
        if ($_POST['title'] === 'Monsieur' || $_POST['title'] === 'Madame') {
            $title = $_POST['title'];
        } else {
            $formErrors['title'] = 'Vôtre civilité est incorrecte';
        }
    } else {
        $formErrors['title'] = 'Veuillez renseigner votre civilité';
    }

    // on vérifie que la variable $_POST['lastName'] existe ET n'est pas vide.
    if (!empty($_POST['lastName'])) {
        // Je vérifie bien que ma variable $_POST['lastName'] correspond à ma patternName.
        if (preg_match($patternName, $_POST['lastName'])) {
            // On stocke dans la variable lastName la variable $_POST['lastName'] dont on a désactivé les balises HTML.
            $lastName = htmlspecialchars($_POST['lastName']);
        } else {
            // Si la saisie utilisateur ne correspond pas à la regex on va stocker une erreur lastName dans notre tableau d'erreurs.
            $formErrors['lastName'] = 'Vôtre nom de famille est incorrect';
        }
    } else {
        // On va réutiliser notre erreur lastName parce que les deux ne peuvent pas exister en même temps.
        $formErrors['lastName'] = 'Veuillez renseigner votre nom de famille';
    }

    if (!empty($_POST['firstName'])) {
        if (preg_match($patternName, $_POST['firstName'])) {
            $firstName = htmlspecialchars($_POST['firstName']);
        } else {
            $formErrors['firstName'] = 'Vôtre prénom est incorrect';
        }
    } else {
        $formErrors['firstName'] = 'Veuillez renseigner votre prénom';
    }
    
    // AGE 
     if (!empty($_POST['age'])) {
        if (preg_match($patternAge, $_POST['age'])) {
            $age = htmlspecialchars($_POST['age']);
        } else {
            $formErrors['age'] = 'Vôtre age est incorrect';
        }
    } else {
        $formErrors['age'] = 'Veuillez renseigner votre age';
    }
}
?>
<div class="container">
    <p>Faire une page permettant de saisir les informations suivantes :</p>
    <ul>
        <li>Civilité (liste déroulante)</li>
        <li>Nom</li>
        <li>Prénom</li>
        <li>Age</li>
        <li>Société</li>
    </ul>
    <p>A la validation, les données saisies devront aparaitre sous le formulaire. Attention les données devront rester dans les différents éléments du formulaire même après la validation.</p>
    <?php
    // On affiche le formulaire si rien a été envoyé ou qu'il y a une erreur dans ce qui à été saisi.
    ?>
    <form method="POST" action="index.php">
        <div class="form-group">
            <label for="title">Civilité</label>
            <select name="title" class="form-control" id="title" required>
                <option disabled selected>Veuillez faire un choix !</option>
                <option value="Monsieur" <?= isset($_POST['title']) && $_POST['title'] == 'Monsieur' ? 'selected' : '' ?>>Monsieur</option>
                <option value="Madame" <?= isset($_POST['title']) && $_POST['title'] == 'Madame' ? 'selected' : '' ?>>Madame</option>
            </select>
            <?php if (isset($formErrors['title'])) { ?>
                <div class="alert-danger">
                    <p><?= $formErrors['title'] ?></p>
                </div>
            <?php } ?>
        </div>

        <div class="form-group">
            <label for="lastName">Nom de famille</label>
            <?php
            /* On donne en valeur à notre input ce qui a été saisi par notre utilisateur . ça permet à l'utilisateur de ne pas ressaisir ses données en cas d'erreur
             * isset($_POST['lastName']) ? $_POST['lastName'] : ''
             * Si $_POST['lastName'] existe (?) alors on affiche $_POST['lastName'] (:) Sinon on affiche rien.
             */
            ?>
            <input type="text" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : '' ?>" name="lastName" class="form-control" id="lastName" placeholder="Dupont" required />
            <?php
            // On affiche un alerte rouge qui contient le texte de l'erreur s'il y en à une.
            if (isset($formErrors['lastName'])) {
                ?>
                <div class="alert-danger">
                    <p><?= $formErrors['lastName'] ?></p>
                </div>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="firstName">Prénom</label>
            <input type="text" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : '' ?>" name="firstName" class="form-control" id="firstName" placeholder="Jean" required />
            <?php if (isset($formErrors['firstName'])) { ?>
                <div class="alert-danger">
                    <p><?= $formErrors['firstName'] ?></p>
                </div>
            <?php } ?>
        </div>
        
        <!--age -->
           <div class="form-group">
            <label for="age">age</label>
            <input type="text" value="<?= isset($_POST['age']) ? $_POST['age'] : '' ?>" name="age" class="form-control" id="age" required />
            <?php if (isset($formErrors['age'])) { ?>
                <div class="alert-danger">
                    <p><?= $formErrors['age'] ?></p>
                </div>
            <?php } ?>
        </div>


        <input type="submit" name="submit" value="Envoyer" class="btn btn-primary" />
    </form>
    <?php
    /* Pour l'affichage des données si tout a été validé
     * On affiche une alerte verte pour prévenir que l'utilisateur que tout s'est bien passé:
     * On affiche les variables lastname , firstname et title car elle contiennent la saisie de l'utilisateur si tout s'est bien passée
     * On utilise la balises br uniquement dans un p
     * On a ajouté un bouton de retour au formulaire pour simplifier la navigation.
     */
    if (count($_POST) > 0 && count($formErrors) == 0) {
        ?>
        <div class="alert-success">
            <p>Vos données ont bien été envoyées et votre fichier a bien été transmis.</p>
        </div>
        <div class="well jumbotron">
            <p>
                Civilité : <?= $title ?><br/>
                Nom : <?= $lastName ?> <br/>
                Prénom : <?= $firstName ?><br/>
                age : <?= $age ?>

            </p>
            <a href="index.php" title="Retour vers le formulaire" class="btn btn-info">Ajouter un nouvel utilisateur</a>
        </div>
    <?php } ?>
</div>
</body>
</html>
