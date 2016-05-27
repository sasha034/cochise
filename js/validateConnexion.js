function validateConnexion(){
    if(document.formulaireConnexion.pseudo.value === ''){
        window.alert("Veuillez entrer un login");
        return false;
    }
    if(document.formulaireConnexion.password.value === ''){
        window.alert("Veuillez entrer un mot de passe");
        return false;
    }
    return true;
}

