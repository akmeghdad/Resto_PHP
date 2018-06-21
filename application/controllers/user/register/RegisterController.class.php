<?php


class RegisterController
{
	public function httpGetMethod(Http $http, array $queryFields)
	{
        // var_dump($queryFields);
    }
    public function httpPostMethod(Http $http, array $formFields)
    {
        // var_dump($formFields);
        // return;
        $error = array();
        $count = 0;
        
        if (empty($formFields["nom"])) {
            $error[] = "Le champ <em><strong>Nom</strong></em> est requis.";
        }
        if (empty($formFields["prenom"])) {
            $error[] = "Le champ <em><strong>Prénom</strong></em> est requis.";
        }
        // if (!is_numeric($formFields["code_postal"])) {
        //     $error[] ="Le champ <em><strong>Code postal</em></strong> doit être un nombre.";
        // }
        // if (!is_numeric($formFields["phone"])) {
        //     $error[] ="Le champ <em><strong>Téléphone</em></strong> doit être un nombre.";
        // }
        if (strlen($formFields["phone"]) > 15 ) {
            $error[] ="Le champ <em><strong>Téléphone</strong></em> doit avoir max. 15 caractère(s).";
        }
        if (strlen($formFields["phone"]) < 10 ) {
            $error[] ="Le champ <em><strong>Téléphone</strong></em> doit avoir min. 10 caractère(s).";
        }
        if (empty($formFields["mail"])) {
            $error[] = "Le champ <em><strong>E-mail</strong></em> est requis.";
        }
        if (empty($formFields["mdp"])) {
            $error[] = "Le champ <em><strong>Mot de passe</strong></em> est requis.";
        }
        // if (strlen($formFields["mdp"]) < 8 ) {
        //     $error[] = "Le champ <em><strong>Mot de passe</strong></em> doit avoir au moins 8 caractère(s).";
        // }
        if (!RegisterModel::hasEmail($formFields["mail"])) {
            $error[] = "L'<em><strong>Email</strong></em> existe.";
        }

        if (!empty($error)) {
            $return_error ='';
            foreach ($error as $key ) {
                $count ++;
                $return_error .= $key . '<br>';
            }
            // return $return_error;
            return [ 'error' => $return_error ,'count_error' => $count];
        }else{
            $register = new RegisterModel();
            $register->addUser($formFields);
        }
        // return $error;

        // <aside class="error-message hidden" style="display: block;">
		// <h3><i class="fa fa-warning"></i> Il y a <span id="total-error-count">1</span> erreur(s) dans le formulaire !</h3>
		// <p>Le champ <em><strong>Nom</strong></em> est requis.<br>Le champ <em><strong>Prénom</strong></em> est requis.<br>Le champ <em><strong>E-mail</strong></em> est requis.<br>Le champ <em><strong>Mot de passe</strong></em> est requis.<br>Le champ <em><strong>Mot de passe</strong></em> doit avoir au moins 8 caractère(s).<br></p>
	    // </aside>

        
        



/*
        <aside class="error-message hidden" style="display: block;">
		<h3><i class="fa fa-warning"></i> Il y a <span id="total-error-count">1</span> erreur(s) dans le formulaire !</h3>
		<p>
	        <?php if (isset($return_error)) {
                echo $return_error;
            }else{
                echo 'nn';
            }
            
            var_dump($error)?>
        </p></aside> */
        
        
    }

}