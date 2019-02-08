
const nombreRows = 10;
const nombreCols = 20;
const nombreGrid = nombreRows*nombreCols;

const displayZone = document.getElementById('displayZone');
let scoreZone = document.getElementById('scoreZone');
// calcul des résultat
let nbrShooot = document.getElementById('NbrShooot');
let successRate = document.getElementById('successRate');

const maxUser = nombreGrid;
const minUser = (nombreGrid - nombreCols)+1;

const nombreEnnemisToCreate = (3 * nombreCols);



launchGame();

function launchGame(){


let shootCounter = 0;
let choosenSpeed = 0;
const speed = [10,6,4,2];


// generate grid
generate_grid();

  // generate ennemis
  generate_ennemis();

  // générate user
  let objUser = generate_user(maxUser,nombreCols);

    window.addEventListener('keydown',function(event){

      switch(event.key){
        // shhot
        case ' ':
          shootThemUp(objUser,nombreCols,shootCounter);
        break;
        // shhot
        case 'ArrowUp':
          shootThemUp (objUser,nombreCols,shootCounter);
        break;
        // move to left
        case 'ArrowLeft':
          moveObj(-1,objUser);
        break;
        // move to right
        case 'ArrowRight' :
          moveObj(1,objUser);
        break;

        // get out of game
        case 'Escape' :
          endOfGame('Mission aborted.');
        break;

        default:
        break;
      }
    });


  // Boucle mouvement ennemis
  var varMain = setInterval(main, (speed[choosenSpeed]*100));
  var loop = 1;
  let listEnnemis;

  function main(){

          listEnnemis = document.getElementsByClassName('ennemi');
          if(listEnnemis.length > 0){

            if(Number.isInteger(loop/speed[choosenSpeed])){
              for(let iter=0; iter<nombreCols; iter++){
                moveAllEnnemis(1);
              }
              moveAllEnnemis(1);
            }
            else {
              if(Number.isInteger(loop/2)){
                moveAllEnnemis(1);
              }
              else {
                moveAllEnnemis(-1);
              }
            }
          }
          else{
            endOfGame('Mission completed.');
          }


      loop++;
  }


  // Boucle mouvement ennemis
  var varShoot = setInterval(moveAllshoots, 50);


}



/* ------------------------------------------------------------------------------------------------------------
          LIBRAIRIES
------------------------------------------------------------------------------------------------------------ */

function shootThemUp (objUser,nombreCols,shootCounter){
  let current = objUser.parentElement;
  let gridNum = parseInt(current.id.substring(5),10);
  let target = (gridNum - nombreCols);
  let shoot = createObj('shoot.gif','shoot','shoot');
  placeInGrid(target, shoot);
  shootCounter++;
  nbrShooot.innerHTML = shootCounter;
}


// fonction déplacement
function moveObj(direction,obj){

  let current = obj.parentElement;
  let gridNum = parseInt(current.id.substring(5),10);

  if(obj.id.substring(5)=='user'){
    if((direction + gridNum) >= minUser && (direction + gridNum) <= maxUser){
      placeInGrid((gridNum + direction),obj);
    }
  }

  else if(obj.id.substring(5)=='shoot'){
    if(gridNum > nombreCols){
      placeInGrid((gridNum + direction),obj);
    }else {
      obj.parentElement.innerHTML='';
    }
  }
  else if ((gridNum + direction) < minUser){
    placeInGrid((gridNum + direction),obj);
  }
  else{
    // fin de jeu : echec
    endOfGame('Raté');
  }
  current.innerHtml = '';
}

function placeInGrid(id,obj) {
  let to = document.getElementById('grid-'+id);
  if(to){
    to.appendChild(obj);
  }
}

// Le nom aprle de lui même
function bOOOOOOOm(obj){
  if(obj.childNodes.length > 1){
    obj.innerHTML = '';
    successRate.innerHTML = successCalc();
  }
}

// create grid 100 x 100
function generate_grid(){
  let iteration = 1;

  let gridTable = document.createElement('TABLE');

  for(let row =1; row <= nombreRows; row++){

    let gridTr = document.createElement('TR');

    for(let col =1; col <= nombreCols; col++){

      let gridTd = document.createElement('TD');
      gridTd.setAttribute('id','grid-' + iteration);
      gridTd.setAttribute('class','row-' + row);
      gridTr.appendChild(gridTd);
      iteration++;

    }

    gridTable.appendChild(gridTr);
  }

  displayZone.appendChild(gridTable);
};

// Bouger tous les ennemis
function moveAllEnnemis(direction){
 let listEnnemis = document.getElementsByClassName('ennemi');
 let obj;
 for(let entre=0; obj=listEnnemis[entre]; entre++){
   moveObj(direction, listEnnemis[entre]);
  }
}

// Bouger tous les tirs
function moveAllshoots(){
  let listShoot = document.getElementsByClassName('shoot');
  let objShoot;
  if(listShoot.length > 0){
    for(let entre=0; objShoot=listShoot[entre]; entre++){
       moveObj(-nombreCols, objShoot);
       bOOOOOOOm(objShoot.parentElement);
      }
    }
  }


// create ennemi and place it on the grid
function generate_ennemis(){
  let count = 1;

  for(var nombreEnnemis = 1;nombreEnnemis <= nombreEnnemisToCreate; nombreEnnemis++){

    let colors = ['css1.png','html1.png','jpg1.png','psd1.png','scss1.png','php1.png','js1.png'];
    let num = getRandomInt((colors.length));

    let ennemi = createObj(colors[num],nombreEnnemis,'ennemi');
    let actual = Math.ceil(count/nombreRows);
    let startCase = ((actual-1) * nombreCols)+2 ;
    let lastCase = (actual * nombreCols)-2 ;

    if(
      (Number.isInteger(count/2)) &&
      ( startCase < count  || lastCase > count)
   ){
    placeInGrid(nombreEnnemis,ennemi);
    }
    count++;
  }

}

function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}

// create user and position
function generate_user(maxUser,nombreCols){
  let objUser = createObj('ship.gif','user','user');

  let userPosition = Math.ceil(maxUser-(nombreCols/2));
  placeInGrid(userPosition,objUser);
  return objUser;
}

// create obj in grid
function createObj(filename,id,className){
  let obj = document.createElement('IMG');
  obj.setAttribute('src','lib/medias/'+filename);
  obj.setAttribute('class',className);
  obj.setAttribute('id','objt-'+id);
  obj.setAttribute('alt','');
  return obj;
}

/* -------------------------------------------------------
          Fonction spéciale : stop le jeu
------------------------------------------------------- */

function endOfGame(varMain,mssg){
  clearInterval(varMain);
  displayZone.style.display = 'inherit';
  mssg += '<br> Shots '+ shootCounter;
  mssg += '<br> Kilobytes destroyed : '+ successCalc() +' kB<br>';
  displayZone.innerHTML = mssg;
  displayRestart();
}

function successCalc(){
  return Math.ceil((nombreEnnemisToCreate/(shootCounter*2))*100);
}

function displayRestart(){
  let restart = document.createElement('a');
  restart.setAttribute('href','?');
  restart.innerHTML='Restart ';
  displayZone.appendChild(restart);
  // let str = document.createElement('p');
  // str.innerHTML = ' - ';
  // displayZone.appendChild(str);

  let accueil = document.createElement('a');
  accueil.setAttribute('href','./');
  accueil.innerHTML=' <br>Home';
  displayZone.appendChild(accueil);
}

function restart(){
  window.location.reload();
}
