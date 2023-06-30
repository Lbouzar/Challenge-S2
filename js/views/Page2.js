import { BrowserLink } from "../components/BrowserRouter.js";
import Button from "../components/Button.js";
import Compteur from "../components/Compteur.js";
import { Link } from "../components/Link.js";
import { generateStructure } from "../core/DomRenderer.js";

export default function Page2() {
  const structure = {
    type: "div",
    children: [
      BrowserLink("Page 1", "/page1"),
      Link("Index", "/"),
      Link("Page 1", "/articles/page1"),
      {
        type: "h1",
        children: ["Coucou"],
      },
      {
        type: "h2",
        children: ["Bonsoir"],
      },
      {
        type: "h3",
        children: ["Tout le monde"],
      },
      {
        type: "p",
        children: ["Ici le javascript"],
      },
      generateStructure(
        Button({
          title: "Coucou button",
          style: {
            backgroundColor: "blue",
            color: "white",
          },
          onClick: () => alert("coucou"),
        })
      ),
      generateStructure(Compteur({ initialValue: 10 })),
    ],
  };

  return generateStructure(structure);
}
