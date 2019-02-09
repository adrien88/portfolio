var mssgarea = document.getElementById('returnmessage');
var form = document.getElementById('loginform');
//
// Ecouter > déclancher fonction asynchrone

// // Ecouter > déclancher fonction asynchrone
form.addEventListener('submit',async function(event){
  //suspendre envoie
  event.preventDefault();
  // formate les données du formulaire (Json)
  let data = new FormData(form);
  // console.log(data);
  // fetch : en attente
  let response = await fetch(form.getAttribute('action'),{
    method: 'POST',
    headers:{
      'X-Requested-With':'xmlhttprequest'
    },
    body : data
  });
  // erreur réseau
  if(response.ok === false){
    mssgarea.innerHTML = "NetWork Error " + await response.status;
  }
  // afficher result
  else{
    mssgarea.innerHTML = await response.json();
  }
});
