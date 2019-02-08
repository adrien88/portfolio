
// Déclarer des variables
// Dom HTML
let rejouer = document.getElementById('rejouer');
let valider = document.getElementById('submit');
let form = document.getElementById('form');
// mathématiques et logiques
let preventBack = false;
const but = Math.floor(Math.random() * 99) + 1;
let restant = 10;

// event listener
form.addEventListener('submit', function(event){

  // neutralise l'envoie
  event.preventDefault();
  //  get saisie
  let saisie = document.getElementById('saisie');

  // testr veleurs saisies
  if (
      (/^[0-9]{1,2}$/.test(saisie.value)) &&
      (saisie.value > 0) &&
      (saisie.value < 100)
  ){
    // tester le nombre de coups restants
    if(restant > 0){
      // reinit variable
      preventBack=false;
      // decrementer nombre de test
      restant--;

      // test si supérieur
      if(saisie.value > but){
        addInList('C\'est <b>moins</b> de '+saisie.value+', il reste '+ restant + ' coups.','less');
        saisie.value=null;
      }
      // test si inférieur
      else if(saisie.value < but){
        addInList('C\'est <b>plus</b> de '+saisie.value+', il reste '+ restant + ' coups.','more');
        saisie.value=null;
      }
      // test si égale
      else{
        addInList('C\'était '+but+' ! Vous avez gagné en '+(10-restant)+' coups !','win');
        inverse(valider, rejouer);
        saisie.value=null;
      }
    }
    // Tester fin de partie
    if(restant <= 0){
      addInList('C\'était '+but+' ! Vous avez perdu.','lose');
      inverse(valider, rejouer);
      saisie.value=null;
    }
  }
  // Sinon, afficher message d'erreur.
  else{
    // restant--;
    if(preventBack==false){
      addInList('Vous devez entrer un nombre entre 1 et 99.','error');
      preventBack=true;
    }
  }
});

// ajouter un élément dans la liste
function addInList(text,classObj){
  // create element i
  let blocklist = document.createElement('li');
  blocklist.innerHTML = text;
  blocklist.setAttribute('class',classObj);
  // pushing in list
  let liste = document.getElementById('liste');
  liste.appendChild(blocklist);
}

//  refresh button
function refresh(){
  // recherger la page
  window.location.reload();
}

// reverse newgame/play buttons
function inverse(valider, rejouer){
  valider.style.display= "none";
  rejouer.style.display= "block";
}
