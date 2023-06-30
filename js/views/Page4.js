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
              id: "Password",
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
  console.log("Form submitted:", { name, email, message });
}
