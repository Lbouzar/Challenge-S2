import { generateStructure } from "../core/DomRenderer";
import { BrowserLink } from "../components/BrowserRouter.js";
import Button from "../components/Button";
import DomRenderer from "../core/DomRenderer";

export default function Page4() {
  const installer = {
    type: "form",
    title: "installer",
    attributes: {
      style: {
        display: "flex",
        flexDirection: "column",
        marginTop: "10em",
        alignItems: "center",
      },
    },

    children: [
      {
        type: "div",
        children: [
          {
            type: "label",
            text: "Nom:",
          },
          {
            type: "input",
            attributes: {
              type: "text",
              placeholder: "Nom",
              id: "name",
              style: { color: "blue", marginTop: "1em" },
            },
          },
        ],
      },
      {
        type: "div",
        children: [
          {
            type: "label",
            text: "Prenom",
          },
          {
            type: "input",
            attributes: {
              id: "prenom",
              placeholder: "Prénom",
              style: { color: "blue", marginTop: "1em" },
            },
          },
        ],
      },
      {
        type: "div",
        children: [
          {
            type: "label",
            text: "Email:",
          },
          {
            type: "input",
            name: "email",
            attributes: {
              type: "email",
              placeholder: "Email",
              id: "email",
              style: { color: "blue", marginTop: "1em" },
            },
          },
        ],
      },
      {
        type: "div",
        children: [
          {
            type: "label",
            text: "Password",
          },
          {
            type: "input",
            name: "Password",
            attributes: {
              type: "Password",
              placeholder: "Password",
              id: "password",
              style: { color: "blue", marginTop: "1em" },
            },
          },
        ],
      },

      Button({
        title: "Submit",
        style: {
          backgroundColor: "blue",
          color: "white",
          marginTop: "1em",
        },
        onClick: handleSubmitUser,
      }),
    ],
  };

  const rootElement = document.getElementById("root");
  console.log(installer, "installer");
  rootElement.prepend(DomRenderer(installer));
  // generateStructure(installer);
}
function handleSubmitUser(event) {
  window.location.href = "/page5";
  event.preventDefault();

  const name = document.getElementById("nom").value;
  const email = document.getElementById("email").value;
  const prenom = document.getElementById("prenom").value;
  const password = document.getElementById("password").value;

  const formData = {
    formType: "user",
    name: name,
    email: email,
    prenom: prenom,
    password: password,
  };

  console.log(formData);
  fetch("http://localhost:80/installer", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(formData),
  })
    .then((response) => {
      console.log(response);
      if (response.ok) {
        console.log("Form submitted successfully");
      } else {
        console.error("Form submission failed");
      }
    })
    .catch((error) => {
      console.error("An error occurred:", error);
    });
}
