const budapest = "budapest.jpg",
Lisbon = "Lisbon.jpeg",
Londres = "Londres.jpeg";
MexicoCity = "Mexico_city.jpeg";
Paris = "Paris.jpeg";
Rome = "Rome.jpeg";
Tokyo = "Tokyo.jpeg";
Washington = "Washington.jpeg";
const C_BACK = "MemoryVerso.png";
const config_cards = [budapest, Lisbon, Londres, MexicoCity, Paris, Rome, Tokyo, Washington, budapest, Lisbon, Londres, MexicoCity, Paris, Rome, Tokyo, Washington];


let previousCard = " ";
let previousIndex = null;
let previousCardElement;
let compteur = 0;

const replayBtn = document.getElementById("replaybtn");
const cards = document.querySelectorAll(".card");
const imgUrl = (img) => `assets/Images/Theme_1/${img}`;


/**
* Randomize un tableau (renvoie un nouveau tableau)
* @param {string[]} arr
* @returns {string[]}
*/
/**
* Fonction pour changer l'image d'un element HTML
* @param {Element} element - Element duquel on va changer l'image
* @param {string} imageUrl - Url de l'image
*/


//fonctions 


function melanger(arr) {
//melanger le tableau avec les images
const copy = [...arr];
const result = [];
let i = copy.length;
while (i > 0) {
const cardIndex = Math.floor(Math.random() * copy.length); // 0 et la longueur du tableau (non-comprise)
const card = copy.splice(cardIndex, 1)[0];
result.push(card);
i--;
}
return result;
}

function changeImageSrc(element, imageUrl) {
element.src = imageUrl;
}

function replay() {
if (state.canPlay) {
return;
}
resetCards();
state.cards = melanger(config_cards);
state.canPlay = true;
}

function resetCards() {
document
.querySelectorAll(".back")
.forEach((imgEl) => changeImageSrc(imgEl, imgUrl(C_BACK)));
}



const state = {
canPlay: true,
cards: melanger(config_cards),
};



for (let i = 0; i < cards.length; i++) {
if (!state.canPlay) return alert("REJOUEZ SVP");
cards[i].addEventListener("click", function(event){
if(compteur == 16){
state.canPlay = false;
clearInterval(chrono);
compteur = 0;
previousCard = " ";
previousIndex = null;
}else if(compteur <= 16){
changeImageSrc(cards[i].querySelector("img"), imgUrl(state.cards[i]));

if(previousCard === " "){

previousCard = state.cards[i];
previousCardElement = cards[i];
previousIndex = i;

}else{

if(state.cards[i] === previousCard && i != previousIndex){
previousCard = " ";
previousIndex = null;
compteur += 2;
}else{
previousCard = " ";
previousIndex = null;
setTimeout(() => {
changeImageSrc(cards[i].querySelector("img"), imgUrl(C_BACK))
changeImageSrc(previousCardElement.querySelector("img"), imgUrl(C_BACK))
}, 800);
}
}
}
});
}


replayBtn.addEventListener("click", replay);