import DomRenderer from "../core/DomRenderer.js";
import { matchPath } from "../pathUtils.js";

export function HashLink(title, link) {
  return {
    type: "a",
    attributes: {
      href: "#" + link,
    },
    children: [title],
  };
}

export default function HashRouter(routes, rootElement) {
  let currentComponent = null;

  function renderComponent(component) {
    if (currentComponent) {
      if (typeof currentComponent.onExit === "function") {
        currentComponent.onExit();
      }
      rootElement.removeChild(currentComponent.element);
    }

    currentComponent = component;

    if (typeof currentComponent.onEnter === "function") {
      currentComponent.onEnter();
    }
    rootElement.appendChild(currentComponent.element);
  }

  function handleHashChange() {
    const pathname = window.location.hash.slice(1);

    const matchedRoute = routes.find((route) =>
      matchPath(pathname, route.path)
    );
    if (matchedRoute) {
      renderComponent(matchedRoute.component);
    } else {
      console.error(`No matching route found for ${pathname}`);
    }
  }

  window.addEventListener("hashchange", handleHashChange);

  handleHashChange(); // Initial rendering

  return {
    destroy: function () {
      window.removeEventListener("hashchange", handleHashChange);
      if (currentComponent && typeof currentComponent.onExit === "function") {
        currentComponent.onExit();
      }
    },
  };
}
