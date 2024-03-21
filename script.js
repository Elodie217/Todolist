///////////////////// Inscription /////////////////////

document
  .querySelector(".boutonInscription")
  .addEventListener("click", function (evenement) {
    let nom = document.querySelector("#nom").value;
    let prenom = document.querySelector("#prenom").value;
    let email = document.querySelector("#email").value;
    let password = document.querySelector("#password").value;
    let password2 = document.querySelector("#password2").value;
    if (
      nom !== "" &&
      prenom !== "" &&
      email !== "" &&
      password !== "" &&
      password2 !== ""
    ) {
      document.querySelector(".champVideInscription").innerText = "";
      if (checkEmail(email) == true) {
        document.querySelector(".emailIncorrectInscription").innerText = "";
        if (password.length > 6 && password2.length > 6) {
          document.querySelector(".mdpIncorrectInscription").innerText = "";
          if (password == password2) {
            document.querySelector(".mdpIncorrectInscription").innerText = "";

            inscription();
          } else {
            document.querySelector(
              ".mdpIncorrectInscription"
            ).innerText = `Vos mots de passe sont différents.`;
            evenement.preventDefault();
          }
        } else {
          document.querySelector(
            ".mdpIncorrectInscription"
          ).innerText = `Merci d'entrer au moins 7 caractères.`;
          evenement.preventDefault();
        }
      } else {
        document.querySelector(
          ".emailIncorrectInscription"
        ).innerText = `Merci de mettre un email valide.`;
        evenement.preventDefault();
      }
    } else {
      document.querySelector(
        ".champVideInscription"
      ).innerText = `Merci de remplir tous les champs.`;
      evenement.preventDefault();
    }
  });

function inscription() {
  let nom = document.querySelector("#nom").value;
  let prenom = document.querySelector("#prenom").value;
  let email = document.querySelector("#email").value;
  let password = document.querySelector("#password").value;
  let password2 = document.querySelector("#password2").value;

  let userInscription = {
    nom: nom,
    prenom: prenom,
    email: email,
    password: password,
    password2: password2,
  };

  let params = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(userInscription),
  };

  fetch("./src/inscription.php", params)
    .then((res) => res.text())
    .then((data) => reussiteEchecInscription(data));
}

function reussiteEchecInscription(reponse) {
  console.log(reponse);
  if (reponse) {
    console.log("dans le if");
    redirection("divInscription", "divConnexion");
    document.querySelector('.InscriptionReussite').classList.remove('hidden');
      setTimeout(() => {
      document.querySelector('.InscriptionReussite').classList.add('hidden');
      }, 5000);  
  } else {
    console.log("dans le else");
    document.querySelector(".champVideInscription").innerText = reponse;
  }
}

function checkEmail(email) {
  let re =
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

///////////////////// Connexion /////////////////////

document
  .querySelector(".bouttonConnexion")
  .addEventListener("click", function (evenement) {
    let emailConnexion = document.querySelector("#emailConnexion").value;
    let passwordConnexion = document.querySelector("#passwordConnexion").value;

    if (emailConnexion !== "" && passwordConnexion !== "") {
      document.querySelector(".champVideConnexion").innerText = "";
      if (checkEmail(emailConnexion) == true) {
        document.querySelector(".emailIncorrectConnexion").innerText = "";

        connexion();
      } else {
        document.querySelector(
          ".emailIncorrectConnexion"
        ).innerText = `Merci de mettre un email valide.`;
        evenement.preventDefault();
      }
    } else {
      document.querySelector(
        ".champVideConnexion"
      ).innerText = `Merci de remplir tous les champs.`;
      evenement.preventDefault();
    }
  });

function connexion() {
  let emailConnexion = document.querySelector("#emailConnexion").value;
  let passwordConnexion = document.querySelector("#passwordConnexion").value;

  let userConnexion = {
    emailConnexion: emailConnexion,
    passwordConnexion: passwordConnexion,
  };

  let params = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(userConnexion),
  };

  fetch("./src/connexion.php", params)
    .then((res) => res.text())
    .then((data) => reussiteEchecConnexion(data));

  // Si c'est du JSON mettre :   .then((res) => res.json())
}

function reussiteEchecConnexion(reponse) {
  if (reponse === "success") {
    redirection("divConnexion", "divToDoList");
  } else {
    document.querySelector(
      ".champVideConnexion"
    ).innerText = `Mot de passe ou email incorrecte.`;
  }
}

/**
 * [Affichage des différents blocks]
 *
 * @param   {[string]}  blockAddHidden     [Le block qui va être caché]
 * @param   {[string]}  blockRemoveHidden  [Le block qui va apparaiter]
 */
function redirection(blockAddHidden, blockRemoveHidden) {
  document.querySelector("." + blockAddHidden).classList.add("hidden");
  document.querySelector("." + blockRemoveHidden).classList.remove("hidden");
}

/////////////////////Tache/////////////////////

document
  .querySelector(".boutonAjouter")
  .addEventListener("click", function (evenement) {
    let titre = document.querySelector("#titre").value;
    let date = document.querySelector("#date").value;
    let priorite = document.querySelector("#priorite").value;

    if (titre !== "" && date !== "" && priorite !== "") {
      document.querySelector(".erreurTodo").innerText = "";

      ajouterTache();
    } else {
      document.querySelector(
        ".erreurTodo"
      ).innerText = `Merci de remplir Le titre et la date.`;
      evenement.preventDefault();
    }
  });

let idTache = "";
async function ajouterTache() {
  let titre = document.querySelector("#titre").value;
  let date = document.querySelector("#date").value;
  let priorite = document.querySelector("#priorite").value;
  let description = document.querySelector("#description").value;

  let creerTache = {
    titre: titre,
    date: date,
    priorite: priorite,
    description: description,
  };

  let params = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(creerTache),
  };

  fetch("./src/traitement.php", params)
    .then((res) => res.text())
    .then((data) => lienTacheCategorie(data));
}

function lienTacheCategorie(idTache) {
  let categories = document.querySelectorAll("input[type='checkbox']");

  let categorieTache = [];

  categories.forEach((element) => {
    if (element.checked == true) {
      categorieTache += element.value;
    }
  });

  let creerLien = {
    idTache: idTache,
    categorieTache: categorieTache,
  };

  let params = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(creerLien),
  };

  fetch("./src/lienTacheCategorie.php", params)
    .then((res) => res.text())
    .then((data) => {if(data)
      {
      document.querySelector('.tacheCreer').classList.remove('hidden');
      setTimeout(() => {
      document.querySelector('.tacheCreer').classList.add('hidden');
      }, 5000);   
     };
    recupererTaches(); 

    });

}


recupererTaches() 
async function recupererTaches() {
 

  fetch("./src/afficherTache.php")
    .then((res) => res.json())
    .then((data) => afficherTaches(data))


}


function afficherTaches(Taches){

  let cards = document.querySelector(".listTache");
 
  cards.innerHTML = "";


   Taches.map((user) => {
    (cards.innerHTML += `<div class='w-60 h-fit m-[5%] mt-10 shadow-xl rounded-2xl relative bg-[#DFE0DF]/[.6]'>
                        <div class='divCouleurPriorite`+user['Id_tache']+` w-full h-3.5 rounded-t-2xl'></div>
                        <a href='' class='absolute top-5 right-3  w-7 h-7 flex items-center flex-col justify-center rounded-xl cursor-pointer'><i class='fa-solid fa-trash text-black'></i></a>
                        <a href='' class='absolute top-5 right-10  w-7 h-7 flex items-center flex-col justify-center rounded-xl cursor-pointer'> <i class='fa-solid fa-pen-to-square text-black'></i> </a>
                        <div class='px-2.5 py-2.5'>
                            <h3 class='text-2xl text-center my-3.5 font-semibold'>`+user['Titre']+`</h3>
                            <div class='flex justify-between'>
                                <p>`+user['Date'] +`</p>
                                <i class='fa-solid fa-dumbbell'></i>
                            </div>
                            <div class='my-2.5'>
                                <p class='mb-1 font-semibold'>Description :</p>
                                <p>`+user['Description']+`</p>
                            </div>
                        </div>
                    </div>`);
  

  let divCouleurPriorite = document.querySelector('.divCouleurPriorite'+user['Id_tache']);
    
    if (user['Id_priorite'] == 1) {
      divCouleurPriorite.classList.add(`bg-[#1eff00]`);
      
    }else if (user['Id_priorite'] == 2){ 
      divCouleurPriorite.classList.add(`bg-[#ff4f00]`);
      
    }else if (user['Id_priorite'] == 3){  
      divCouleurPriorite.classList.add(`bg-[#ff0000]`);
      
    }
  
});
}


/////////////////////Modification User/////////////////////
document
  .querySelector(".btnModifier")
  .addEventListener("click", function () {
    document.querySelector('.divModificationUser').classList.remove("hidden");
  })

  document
  .querySelector(".btnRetourModificationUser")
  .addEventListener("click", function () {
    document.querySelector('.divModificationUser').classList.add("hidden");
  })
