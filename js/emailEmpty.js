function emailEmpty(){
    if(document.formulaire_Newsletter.email.value === ''){
        window.alert("Veuillez entrer un identifiant");
        return false;
    }
    /*else{
        window.alert("Votre adresse email n'est pas valide");
        return false;
    }
    return true;*/
}