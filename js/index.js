import DomRenderer from "./core/DomRenderer.js";
import BrowserRouter, { BrowserLink } from "./components/BrowserRouter.js";
import routes from "./routes.js";

// Define your page components
import Page4 from "./views/Page4.js";

// Define your routes

// Get the root element where the application will be rendered
const rootElement = document.getElementById("root");

// Render the application using BrowserRouter and DomRenderer
BrowserRouter(routes, rootElement);
const navigation = {
  type: "ul",
  children: [
    {
      type: "li",
      children: [BrowserLink("Installer", "/page4")],
    },
  ],
};

// Render the navigation
rootElement.prepend(DomRenderer(navigation));
