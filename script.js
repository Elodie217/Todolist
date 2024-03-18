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
  if (reponse == "inscriptionReussite") {
    console.log("dans le if");
    redirection("divInscription", "divConnexion");
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
      lienTacheCategorie();
    } else {
      document.querySelector(
        ".erreurTodo"
      ).innerText = `Merci de remplir Le titre et la date.`;
      evenement.preventDefault();
    }
  });

let idTache = "";
function ajouterTache() {
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
    .then((data) => console.log(data))
    .then((data) => (idTache = data));

  // rouver un moyen de récupérer l'id de la tache ça ça fonctionne pas
}

function lienTacheCategorie() {
  let categories = document.querySelectorAll("input[type='checkbox']");

  let categorieTache = [];

  categories.forEach((element) => {
    if (element.checked == true) {
      categorieTache += element.value;
    }
  });
  console.log(categorieTache);

  let creerLien = {
    categorieTache: categorieTache,
    idTache: idTache,
  };
  console.log(creerLien);

  let params = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(creerLien),
  };

  fetch("./src/lienTacheCategorie.php", params)
    .then((res) => res.text())
    .then((data) => console.log(data));
}
