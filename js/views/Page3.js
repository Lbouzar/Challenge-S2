import { BrowserLink } from "../components/BrowserRouter.js";
import DomRenderer from "../core/DomRenderer.js";

export default function Page3() {
  const navigation = {
    type: "ul",
    children: [
      {
        type: "li",
        children: [BrowserLink("Page1", "/page1")],
      },
      {
        type: "li",
        children: [BrowserLink("Page2", "/page2")],
      },
      {
        type: "li",
        children: [BrowserLink("Page3", "/page3")],
      },
      {
        type: "li",
        children: [BrowserLink("Page4", "/page4")],
      },
      {
        type: "li",
        children: [BrowserLink("Page5", "/page5")],
      },
    ],
  };

  const structure = {
    type: "div",
    children: ["Installer", navigation],
  };

  // Render the navigation
  const rootElement = document.getElementById("root");
  rootElement.prepend(DomRenderer(structure));
}
