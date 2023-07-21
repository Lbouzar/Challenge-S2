import DomRenderer from "../core/DomRenderer.js";
import { matchPath } from "../pathUtils.js";
import generateStructure from "../core/DomRenderer.js";

let routerBasePath;

export default function BrowserRouter(routes, rootElement, baseUrl = "") {
  routerBasePath = baseUrl;
  const pathname = getPathname();
  rootElement.appendChild(renderComponent(routes, pathname));

  const oldPushState = history.pushState;
  history.pushState = function (data, unused, url) {
    oldPushState.call(history, data, unused, url);
    window.dispatchEvent(new Event("popstate"));
  };

  window.addEventListener("popstate", function () {
    const pathname = getPathname();
    rootElement.replaceChild(
      renderComponent(routes, pathname),
      rootElement.firstChild
    );
  });
}

export function BrowserLink(title, link) {
  const realLink = routerBasePath + link;
  return {
    type: "a",
    attributes: {
      href: realLink,
      onClick: function (event) {
        event.preventDefault();
        history.pushState({}, undefined, realLink);
        window.dispatchEvent(new Event("popstate"));
      },
    },
    children: [title],
  };
}

function getPathname() {
  return location.pathname.replace(routerBasePath, "");
}

function renderComponent(routes, pathname) {
  const matchedRoute = routes.find((route) => matchPath(pathname, route.path));
  if (matchedRoute) {
    return DomRenderer(matchedRoute.component());
  } else {
    console.error(`No matching route found for ${pathname}`);
    return null; // or display a fallback component or an error message
  }
}
