
 /* essaye de realiser la story3 partie4 mais echecs par manque de temps. je met l'avancer quand meme pour montrer les essayes realiser 



 function getScore(){
   
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("GET", "ajaxscorememory.php");
  
      requeteAjax.onload = function(){
      const resultat = JSON.parse(requeteAjax.responseText);
      const id_user = document.querySelector('#id_user2').value;
      const html = resultat.map(function(Score){
        if (id_user == Score.Identifiant_du_joueur) {
         return   `
         <div class="scoreByMe">
             <p class="playBy">${Score.Identifiant_du_joueur}</p> : 
             <p class="mescore">${Score.Score_de_la_partie}</p>
             <p class="dateChat">${Score.Date_et_heure_de_la_partie.substring(11, 16)}</p>
         </div>
         `
        }
        return `
        <div class="photo-otherMessage">
                            <div class="containerImage">
                                <img src="assets/Images/PhotoProfilProv.jpg">
                            </div>
          <div class="message">
            <p class="dateChat">${message.Date_et_heure_du_message.substring(11, 16)}</p>
            <p class="sendBy">${message.Pseudo}</p> : 
            <p class="otherChat">${message.Message_content}</p>
          </div>
        </div>
        `
      }).join('');
  
      const ScorePartie = document.querySelector('#ScorePartie');
      console.log(messages)
  
      ScorePartie.innerHTML = html;
      
    }
  
    
    requeteAjax.send();
  }
  
  
  
  function postscore(event){
    event.preventDefault();
  
    const contentscore = document.querySelector('#scoreInput');

    const data = new FormData();
    data.append('contentscore', contentscore.value);
  
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open('POST', 'ajaxscorememory.php?task=write');
    
    requeteAjax.onload = function(){
      contentscore.value = '';
      contentscore.focus();
      getScore();
      const messages = document.querySelector('#ScorePartie');
    }
  
    requeteAjax.send(data);
  }
  
  document.querySelector('form').addEventListener('submit', postscore);
  
  
  getScore();


function postscore(contentscore, niveauDeJeuChoisi, $_POST){
    
    if(!array_key_exists('contentscore', $_POST)){
      for(let i=0; i<contentscore; i++){
        if(niveauDeJeuChoisi===Facile){
          if(contentscore===16){
            document.getElementById(identifiant_de_ma_div).style.display = block;
              return alert("gagné et envoie a la base de donné le score");
              }else{
            document.getElementById(identifiant_de_ma_div).style.display = "none";
            continue;}
        }else if(niveauDeJeuChoisi===Intermediaire);{
              if(contentscore===32){
                document.getElementById(identifiant_de_ma_div).style.display = block;
                return alert("gagné et envoie a la base de donné le score");
              }else{
                document.getElementById(identifiant_de_ma_div).style.display = "none";
                }
                
        }else if (niveauDeJeuChoisi===Expert);{
                if(contentscore===144){
                  document.getElementById(identifiant_de_ma_div).style.display = block;
                    return alert("gagné et envoie a la base de donné le score");
                }else{
                    document.getElementById(identifiant_de_ma_div).style.display = "none";
                    continue;}
                }
        }else(niveauDeJeuChoisi===impossible);{
                if(contentscore===400){
                  document.getElementById(identifiant_de_ma_div).text.style.display = block;
                    return alert("gagné et envoie a la base de donné le score");
                    
                }else{
                  document.getElementById(identifiant_de_ma_div).text.style.display = "none";
                    continue;}
                }
       } 
      }

  */
