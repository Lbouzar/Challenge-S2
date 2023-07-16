import { generateStructure } from "../core/DomRenderer";
import { BrowserLink } from "../components/BrowserRouter.js";
import Button from "../components/Button";
import DomRenderer from "../core/DomRenderer";

export default function Page4() {
  const installer = {
    type: "form",
    children: [
      {
        type: "div",
        children: [
          {
            type: "label",
            text: "Name:",
          },
          {
            type: "input",
            attributes: {
              type: "text",
              placeholder: "User",
              id: "name",
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
            },
          },
        ],
      },
      {
        type: "div",
        children: [
          {
            type: "label",
            text: "Message:",
          },
          {
            type: "input",
            attributes: {
              id: "message",
              placeholder: "message",
            },
          },
        ],
      },
      Button({
        title: "Submit",
        style: {
          backgroundColor: "blue",
          color: "white",
        },
        onClick: handleSubmit,
      }),
    ],
  };

  const rootElement = document.getElementById("root");
  console.log(installer, "installer");
  rootElement.prepend(DomRenderer(installer));
  // generateStructure(installer);
}
function handleSubmit(event) {
  event.preventDefault();

  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const message = document.getElementById("message").value;
  const password = document.getElementById("password").value;

  const formData = {
    name: name,
    email: email,
    message: message,
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
