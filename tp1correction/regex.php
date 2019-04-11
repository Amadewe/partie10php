<?php

$regexName = '#^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$#';
$regexBirthDate = '#^(((19|20)[0-9]{2})\-{1}(0[1-9]{1}|1[0-2]{1})\-(0[1-9]{1}|[1-2]{1}[0-9]{1}|3[0-1]{1}))$#';
$regexCountryAndNationnality = '#^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$#';
$regexAddress = '#^[0-9a-zA-ZÀ-ÖØ-öø-ÿ\.,\-\' \n]+$#';
$regexMail = '#^([a-zA-Z0-9À-ÖØ-öø-ÿ\.\-\_]+)@([a-zA-Z0-9À-ÖØ-öø-ÿ\-\_\.]+)\.([a-zA-Z\.]{2,250})$#';
$regexPhoneNumber = '#^([0][1-79]){1}([ ][0-9]{2}){4}$#';
$regexPoleEmploiNumber = '#^[0-9]{7}[A-Z]{1}$#';
$regexBadgesNumber = '#^[0-9]{1,255}$#';
$regexCodecademyLink = '#^(https:\/\/www\.codecademy\.com\/fr\/users\/)([a-zA-Z0-9]+)(\/achievements)(\/)?$#';

?>