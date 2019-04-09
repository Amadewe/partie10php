<?php
include ('../header.php');
// je stocke dans la variable '$patternName' ma regex pour les noms !
$patternName = '%^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$%';
$patternBirthDate = '#^([0-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$#';
$patternCountry = '%^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$%';
$patternAdress = '#^[A-Za-z0-9À-ÖØ-öø-ÿ \/]{1,100}$#';
$patternEmail = '#^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$#';
$patternPhone = '#^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$#';
$patternPoleEmploi = '#^[0-9]{7}[A-Z]{1}$#';
$patternBadge = '#^([0-9]{1,2}|100)$#';
$patternLinkCodeAcademy = '#^https:\/\/[w-]+[w.-]+.[a-zA-Z]{2,6}#';
$patternQuestion = '#^[a-zÀ-ÖØ-öø-ÿ \'!\?:A-Z0-9\.<>,;\-& \/]{5,100}$#';
// je créé un tableau qui va contenir mes erreurs.
$formErrors = array();


// On vérifie le nombre de lignes dans le tableau POST qui contient toutes les données saisies dans le formulaire. 
if (count($_POST) > 0) {
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

    // date de naissance 
    if (!empty($_POST['birthDate'])) {
        if (preg_match($patternBirthDate, $_POST['birthDate'])) {
            $birtDate = htmlspecialchars($_POST['birthDate']);
        } else {
            $formErrors['birthDate'] = 'Votre date de naissance est incorrecte';
        }
    } else {
        $formErrors['birthDate'] = 'Veuillez renseigner votre date de naissance';
    }
    // pays de naissance
    if (!empty($_POST['nativeCourntry'])) {
        if (preg_match($patternCountry, $_POST['nativeCourntry'])) {
            $nativeCourntry = htmlspecialchars($_POST['nativeCourntry']);
        } else {
            $formErrors['nativeCourntry'] = 'Votre pays de naissance est incorrect';
        }
    } else {
        $formErrors['nativeCourntry'] = 'Veuillez renseigner votre pays de naissance';
    }
    // nationalité
    if (!empty($_POST['nationality'])) {
        if (preg_match($patternCountry, $_POST['nationality'])) {
            $nationality = htmlspecialchars($_POST['nationality']);
        } else {
            $formErrors['nationality'] = 'Votre nationalité est incorrect';
        }
    } else {
        $formErrors['nationality'] = 'Veuillez renseigner votre nationalité';
    }
    // Adresse
    if (!empty($_POST['adress'])) {
        if (preg_match($patternAdress, $_POST['adress'])) {
            $adress = htmlspecialchars($_POST['adress']);
        } else {
            $formErrors['adress'] = 'Votre adresse est incorrecte';
        }
    } else {
        $formErrors['adress'] = 'Veuillez renseigner votre adresse';
    }
    // Email
    if (!empty($_POST['email'])) {
        if (preg_match($patternEmail, $_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);
        } else {
            $formErrors['email'] = 'Votre adresse mail est incorrecte';
        }
    } else {
        $formErrors['email'] = 'Veuillez renseigner votre adresse mail';
    }
    // Téléphone
    if (!empty($_POST['phone'])) {
        if (preg_match($patternPhone, $_POST['phone'])) {
            $phone = htmlspecialchars($_POST['phone']);
        } else {
            $formErrors['phone'] = 'Votre numéro de téléphone est incorrect';
        }
    } else {
        $formErrors['phone'] = 'Veuillez renseigner votre numéro de téléphone';
    }
//Diplôme (sans, Bac, Bac+2, Bac+3 ou supérieur)
    if (!empty($_POST['diploma'])) {
        if ($_POST['diploma'] === 'Sans' || $_POST['diploma'] === 'Bac' || $_POST['diploma'] === 'Bac+2' || $_POST['diploma'] === 'Bac+3' || $_POST['diploma'] === 'Supérieur') {
            $diploma = $_POST['diploma'];
        } else {
            $formErrors['diploma'] = 'Votre diplôme est incorrecte';
        }
    } else {
        $formErrors['diploma'] = 'Veuillez renseigner votre diplôme';
    }

    // Numéro de pôle emploi
    if (!empty($_POST['poleEmploi'])) {
        if (preg_match($patternPoleEmploi, $_POST['poleEmploi'])) {
            $poleEmploi = htmlspecialchars($_POST['poleEmploi']);
        } else {
            $formErrors['poleEmploi'] = 'Votre numéro pôle emploi est incorrect';
        }
    } else {
        $formErrors['poleEmploi'] = 'Veuillez renseigner votre numéro pôle emploi';
    }

    // Nombre de Badget
    if (!empty($_POST['badge'])) {
        if (preg_match($patternBadge, $_POST['badge'])) {
            $badge = htmlspecialchars($_POST['badge']);
        } else {
            $formErrors['badge'] = 'Votre nombre de badge est incorrect';
        }
    } else {
        $formErrors['badge'] = 'Veuillez renseigner votre nombre de badge';
    }

    // lien code academy
    if (!empty($_POST['linkCodeAcademy'])) {
        if (preg_match($patternLinkCodeAcademy, $_POST['linkCodeAcademy'])) {
            $linkCodeAcademy = htmlspecialchars($_POST['linkCodeAcademy']);
        } else {
            $formErrors['linkCodeAcademy'] = 'Le lien code academy est incorrect';
        }
    } else {
        $formErrors['linkCodeAcademy'] = 'Veuillez renseigner le lien code academy';
    }


    // texte super heros
    if (!empty($_POST['heros'])) {
        if (preg_match($patternQuestion, $_POST['heros'])) {
            $heros = htmlspecialchars($_POST['heros']);
        } else {
            $formErrors['heros'] = 'votre réponse doit comporter au minimun 5 mots et au maximun 100 mots';
        }
    } else {
        $formErrors['heros'] = 'Veuillez renseigner quel super héros/héroïne vous seriez et pourquoi';
    }

    // texte hacks
    if (!empty($_POST['experienceHacking'])) {
        if (preg_match($patternQuestion, $_POST['experienceHacking'])) {
            $experienceHacking = htmlspecialchars($_POST['experienceHacking']);
        } else {
            $formErrors['experienceHacking'] = 'votre réponse doit comporter au minimun 5 mots et au maximun 100 mots';
        }
    } else {
        $formErrors['experienceHacking'] = 'Veuillez renseigner votre expérience dans le hacking';
    }

    // experience programmation 
    if (!empty($_POST['experienceProgrammation'])) {
        if ($_POST['experienceProgrammation'] == 'oui' || $_POST['experienceProgrammation'] == 'non') {
            $experienceProgrammation = $_POST['experienceProgrammation'];
        } else {
            $formErrors['experienceProgrammation'] = 'Vôtre réponse sur la programmation est incorrecte';
        }
    } else {
        $formErrors['experienceProgrammation'] = 'Veuillez renseigner votre réponse sur la programmation';
    }
}
?>
<body>
    <div class="container">
        <p>Faire une page pour enregistrer un futur apprenant. On devra pouvoir saisir les informations suivantes :</p>
        <ul>
            <li>Nom</li>
            <li>Prénom</li>
            <li>Date de naissance</li>
            <li>Pays de naissance</li>
            <li>Nationalité</li>
            <li>Adresse</li>
            <li>Email</li>
            <li>Téléphone</li>
            <li>Diplôme (sans, Bac, Bac+2, Bac+3 ou supérieur)</li>
            <li>Numéro pôle emploi</li>
            <li>Nombre de badge</li>
            <li>Liens codecademy</li>
            <li>Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi?</li>
            <li>Racontez-nous un de vos "hacks" (pas forcément technique ou informatique)</li>
            <li>Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?</li>
        </ul>
        <p>A la validation de ces informations, il faudra les afficher dans la même page à la place du formulaire.</p>
        <?php
// On affiche le formulaire si rien a été envoyé ou qu'il y a une erreur dans ce qui à été saisi.
        if (count($_POST) == 0 || count($formErrors) > 0) {
            ?>
            <form method="POST" action="index.php">
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

                <!--date de naissance -->
                <div class="form-group">
                    <label for="birthDate">date de naissance</label>
                    <input type="text" value="<?= isset($_POST['birthDate']) ? $_POST['birthDate'] : '' ?>" name="birthDate" class="form-control" id="birthDate" required />
                    <?php if (isset($formErrors['birthDate'])) { ?>
                        <div class="alert-danger">
                            <p><?= $formErrors['birthDate'] ?></p>
                        </div>
                    <?php } ?> 
                </div> 
                <!--pays de naissance -->
                <div class="form-group">
                    <label for="nativeCourntry">Pays de naissance</label>
                    <input type="text" value="<?= isset($_POST['nativeCourntry']) ? $_POST['nativeCourntry'] : '' ?>" name="nativeCourntry" class="form-control" id="nativeCourntry" required />
                    <?php if (isset($formErrors['nativeCourntry'])) { ?>
                        <div class="alert-danger">
                            <p><?= $formErrors['nativeCourntry'] ?></p>
                        </div>
                    <?php } ?> 
                </div> 
                <!--nationalité -->
                <div class="form-group">
                    <label for="nationality">Nationalité</label>
                    <input type="text" value="<?= isset($_POST['nationality']) ? $_POST['nationality'] : '' ?>" name="nationality" class="form-control" id="nationality" required />
                    <?php if (isset($formErrors['nationality'])) { ?>
                        <div class="alert-danger">
                            <p><?= $formErrors['nationality'] ?></p>
                        </div>
                    <?php } ?> 
                </div> 
                <!--Adresse -->
                <div class="form-group">
                    <label for="adress">Votre adresse</label>
                    <input type="text" value="<?= isset($_POST['adress']) ? $_POST['adress'] : '' ?>" name="adress" class="form-control" id="adress" required />
                    <?php if (isset($formErrors['adress'])) { ?>
                        <div class="alert-danger">
                            <p><?= $formErrors['adress'] ?></p>
                        </div>
                    <?php } ?> 
                </div> 
                <!--Email -->
                <div class="form-group">
                    <label for="email">Votre adresse mail</label>
                    <input type="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" name="email" class="form-control" id="email" required />
                    <?php if (isset($formErrors['email'])) { ?>
                        <div class="alert-danger">
                            <p><?= $formErrors['email'] ?></p>
                        </div>
                    <?php } ?> 
                </div> 
                <!--Téléphone -->
                <div class="form-group">
                    <label for="phone">Votre numéro de téléphone</label>
                    <input type="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>" name="phone" class="form-control" id="phone" required />
                    <?php if (isset($formErrors['phone'])) { ?>
                        <div class="alert-danger">
                            <p><?= $formErrors['phone'] ?></p>
                        </div>
                    <?php } ?> 
                </div> 

                <!--Diplôme -->
                <div class="form-group">
                    <label for="diploma">Diplôme</label>
                    <select name="diploma" class="form-control" id="diploma" required>
                        <option disabled selected>Veuillez faire un choix !</option>
                        <option value="Sans" <?= isset($_POST['diploma']) && $_POST['diploma'] == 'Sans' ? 'selected' : '' ?>>Sans</option>
                        <option value="Bac" <?= isset($_POST['diploma']) && $_POST['diploma'] == 'Bac' ? 'selected' : '' ?>>Bac</option>
                        <option value="Bac+2" <?= isset($_POST['diploma']) && $_POST['diploma'] == 'Bac+2' ? 'selected' : '' ?>>Bac+2</option>
                        <option value="Bac+3" <?= isset($_POST['diploma']) && $_POST['diploma'] == 'Bac+3' ? 'selected' : '' ?>>Bac+3</option>
                        <option value="Supérieur" <?= isset($_POST['diploma']) && $_POST['diploma'] == 'Superieur' ? 'selected' : '' ?>>Supérieur</option>
                    </select>
                    <?php if (isset($formErrors['diploma'])) { ?>
                        <div class="alert-danger">
                            <p><?= $formErrors['diploma'] ?></p>
                        </div>
                    <?php } ?>
                </div>

                <!--Numéro pôle emploi -->
                <div class="form-group">
                    <label for="poleEmploi">Numéro pôle emploi</label>
                    <input type="poleEmploi" value="<?= isset($_POST['poleEmploi']) ? $_POST['poleEmploi'] : '' ?>" name="poleEmploi" class="form-control" id="poleEmploi" required />
                    <?php if (isset($formErrors['poleEmploi'])) { ?>
                        <div class="alert-danger">
                            <p><?= $formErrors['poleEmploi'] ?></p>
                        </div>
                    <?php } ?> 
                </div> 

                <!--Nombre de badge -->
                <div class="form-group">
                    <label for="badge">Nombre de Badge</label>
                    <input type="badge" value="<?= isset($_POST['badge']) ? $_POST['badge'] : '' ?>" name="badge" class="form-control" id="badge" required />
                    <?php if (isset($formErrors['badge'])) { ?>
                        <div class="alert-danger">
                            <p><?= $formErrors['badge'] ?></p>
                        </div>
                    <?php } ?> 
                </div> 

                <!--Lien code academy -->
                <div class="form-group">
                    <label for="linkCodeAcademy">Lien code academy</label>
                    <input type="text" value="<?= isset($_POST['linkCodeAcademy']) ? $_POST['linkCodeAcademy'] : '' ?>" name="linkCodeAcademy" class="form-control" id="linkCodeAcademy" required />
                    <?php if (isset($formErrors['linkCodeAcademy'])) { ?>
                        <div class="alert-danger">
                            <p><?= $formErrors['linkCodeAcademy'] ?></p>
                        </div>
                    <?php } ?> 
                </div> 

                <!--texte heros -->
                <div class="form-group">
                    <label for="heros">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi?</label>
                    <textarea name="heros" class="form-control" id="heros" required rows="5" cols="100"><?= isset($_POST['heros']) ? $_POST['heros'] : '' ?></textarea>
                    <?php if (isset($formErrors['heros'])) { ?>
                        <div class="alert-danger">
                            <p><?= $formErrors['heros'] ?></p>
                        </div>
                    <?php } ?> 
                </div> 

                <!--texte hacks -->
                <div class="form-group">
                    <label for="experienceHacking">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique)</label>
                    <textarea name="experienceHacking" class="form-control" id="experienceHacking" required rows="5" cols="100"><?= isset($_POST['experienceHacking']) ? $_POST['experienceHacking'] : '' ?></textarea>
                    <?php if (isset($formErrors['experienceHacking'])) { ?>
                        <div class="alert-danger">
                            <p><?= $formErrors['experienceHacking'] ?></p>
                        </div>
                    <?php } ?> 
                </div> 

                <!--texte expérience programmation -->
                <p>Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?</p>
                <div>
                    <label for="experienceProgrammation">oui</label>
                    <input type="radio" id="yes" name="experienceProgrammation" value="oui <?= isset($_POST['experienceProgrammation']) && $_POST['experienceProgrammation'] == 'oui' ? 'checked' : '' ?>" />
                    <label for="experienceProgrammation">non</label>
                    <input type="radio" id="no" name="experienceProgrammation" value="non <?= isset($_POST['experienceProgrammation']) && $_POST['experienceProgrammation'] == 'non' ? 'checked' : '' ?>" />
                    <?php if (isset($formErrors['experienceProgrammation'])) { ?>
                        <div class="alert-danger">
                            <p><?= $formErrors['experienceProgrammation'] ?></p>
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
        } else {
            ?> 
            <div class="alert-success">
                <p>Vos données ont bien été envoyées</p>
            </div>
            <div class="well jumbotron">
                <p>
                    Nom : <?= $lastName ?> <br/>
                    Prénom : <?= $firstName ?> <br/>
                    Date de naissance : <?= $birtDate ?> <br/>
                    Pays de naissance : <?= $nativeCourntry ?> <br/>
                    Adresse : <?= $adress ?> <br/>
                    Adresse mail : <?= $email ?> <br/>
                    Téléphone : <?= $phone ?> <br/>
                    Diplôme : <?= $diploma ?> <br/>
                    Numéro pôle emploi : <?= $poleEmploi ?> <br/>
                    Nombre de badge : <?= $badge ?> <br/>
                    Lien code academy : <?= $linkCodeAcademy ?> <br/>
                    Super héros et pourquoi  : <?= $heros ?>  <br/>
                    Expérience en hacking  : <?= $experienceHacking ?> <br/>
                    Expérience dans la programmation : <?= $experienceProgrammation ?>
                </p>
                <a href="index.php" title="Retour vers le formulaire" class="btn btn-info">Ajouter un nouvel utilisateur</a>
            </div>
        <?php } ?>
    </div>
</body>
</html>