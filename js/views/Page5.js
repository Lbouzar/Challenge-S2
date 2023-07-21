import Button from "../components/Button";
import { generateStructure } from "../core/DomRenderer";
import { BrowserLink } from "../components/BrowserRouter.js";
import { type_check_v1 } from "../components/type-check";
import DomRenderer from "../core/DomRenderer";

export default function Page5() {
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
            text: "host",
          },
          {
            type: "input",
            attributes: {
              type: "text",
              placeholder: "Host",
              id: "host",
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
            text: "port",
          },
          {
            type: "input",
            attributes: {
              id: "port",
              placeholder: "Port",
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
            text: "DB_Name",
          },
          {
            type: "input",
            name: "DB_Name",
            attributes: {
              type: "text",
              placeholder: "DB_Name",
              id: "db_name",
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
            text: "DB_User",
          },
          {
            type: "input",
            name: "db_user",
            attributes: {
              type: "text",
              placeholder: "DB_user",
              id: "db_user",
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
              type: "password",
              placeholder: "DB_Password",
              id: "db_password",
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
        onClick: handleSubmitDataBase,
      }),
    ],
  };

  const rootElement = document.getElementById("root");
  console.log(installer, "installer");
  rootElement.prepend(DomRenderer(installer));
  // generateStructure(installer);
}
function handleSubmitDataBase(event) {
  event.preventDefault();

  const host = document.getElementById("host").value;
  const port = document.getElementById("port").value;
  const db_name = document.getElementById("db_name").value;
  const db_user = document.getElementById("db_user").value;
  const db_password = document.getElementById("db_password").value;

  const formData = {
    formType: "database",
    host: host,
    port: port,
    db_name: db_name,
    db_user: db_user,
    db_password: db_password,
  };

  if (
    type_check_v1(formData.host, "string") &&
    type_check_v1(formData.port, "string") &&
    type_check_v1(formData.db_name, "string") &&
    type_check_v1(formData.db_user, "string") &&
    type_check_v1(formData.db_password, "string") &&
    formData.db_password.length >= 8
  ) {
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
  } else {
    console.log(
      type_check_v1(formData.db_password, "string"),
      "paaaaaaaaaasss"
    );
    console.log(type_check_v1(formData.port, "string"), "porttttt");
    window.alert("Format non valide. Veuillez réesseyer");
  }
}
