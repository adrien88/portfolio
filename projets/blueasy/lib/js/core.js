// function link
function link(addr){
  window.location.href=addr;
}

// parcourir les elemnts et
var list=document.getElementsByClassName('square');
for(var i= 0; i < list.length; i++){
  let obj = list[i];
  obj.style.height = obj.offsetWidth+'px';
}


let form = document.getElementById('formmssg');
let mssg = document.getElementById('mssgResult');

// VERSION AJAX JQuery
// // Ecouter > déclancher fonction asynchrone
// form.addEventListener('submit',function(event){
//   event.preventDefault();
//   $.post(
//     form.getAttribute('action'),
//     {
//       name:document.getElementById('name').value,
//       email:document.getElementById('email').value,
//       message:document.getElementById('message').value
//     },
//     function(data,status){
//       mssg.innerHTML = JSON.parse(data);
//     }
//   );
// });

//
//
// // a l'envoi du document
// let form = document.getElementById('formmssg');
// let mssg = document.getElementById('mssgResult');
//
// Ecouter > déclancher fonction asynchrone
form.addEventListener('submit',function(event){
    event.preventDefault();
    let data = new FormData(form);
    fetch().then(function(){return response.json()}).then(function(){})



});

// // Ecouter > déclancher fonction asynchrone
// form.addEventListener('submit',async function(event){
//     //suspendre envoie
//     event.preventDefault();
//     // formate les données du formulaire (Json)
//     let data = new FormData(form);
//     console.log(data);
//     // fetch : en attente
//     let response = await fetch(form.getAttribute('action'),{
//       method: 'POST',
//       headers:{
//         'X-Requested-With':'xmlhttprequest'
//       },
//       body : data
//     });
//     // erreur réseau
//     if(response.ok === false){
//       mssg.innerHTML = "NetWork Error " + await response.status;
//     }
//     // afficher result
//     else{
//       mssg.innerHTML = await response.json();
//     }
// });



function selector(field){

  // count img printed
  let imgprint=0;

  var list=document.getElementsByClassName('square');
  for(var i= 0; i < list.length; i++){
    let obj = list[i];
    var keywords = obj.children[0].innerHTML;
    var tab = keywords.split(",");

    for(var iter= 0; iter < tab.length; iter++){
      if( tab[iter] == field){
        obj.style.display='block';
        imgprint++;
        break;
      } else {
        obj.style.display='none';
      }
    }
  }

  if(imgprint == 0){
    document.getElementById('errorGallery').style.display='block';
  } else {
    document.getElementById('errorGallery').style.display='none';
  }
}

/*
  let list = await response.json();
  document.getElementById('mssgResult').innerHTML = list[0];
  document.getElementById('errorEmail').innerHTML = list[1];
  document.getElementById('errorName').innerHTML = list[2];
  document.getElementById('errorMessage').innerHTML = list[3];

*/
