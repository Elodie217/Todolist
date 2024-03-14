// Inscription

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
    .then((data) => console.log(data));
}

function checkEmail(email) {
  let re =
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

// Connexion

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
    .then((data) => console.log(data));
}
