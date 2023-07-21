import { generateStructure } from "../core/DomRenderer.js";
import Button from "./Button.js";

export default function Compteur({ initialValue = 0 }) {
  let compteur = initialValue;

  function decrement() {
    compteur--;
    render();
  }

  function increment() {
    compteur++;
    render();
  }

  function render() {
    const decrementButton = Button({
      type: "button",
      title: "-",
      style: { backgroundColor: "red" },
    });

    decrementButton.events = {
      click: decrement,
    };

    const incrementButton = Button({
      type: "button",
      title: "+",
      style: { backgroundColor: "green" },
    });

    incrementButton.events = {
      click: increment,
    };

    const structure = generateStructure({
      type: "div",
      children: [
        decrementButton,
        `Current compteur: ${compteur}`,
        incrementButton,
      ],
    });

    const rootElement = document.getElementById("root");
    rootElement.innerHTML = "";
    rootElement.appendChild(structure);
  }

  render();
}
