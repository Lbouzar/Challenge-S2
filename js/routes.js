import Page1 from "./views/Page1.js";
import Page2 from "./views/Page2.js";
import Page3 from "./views/Page3.js";
import Page4 from "./views/Page4.js";

const routes = [
  { path: "/page3", component: Page3 },
  { path: "/", component: Page3 },
  { path: "/page1", component: Page1 },
  { path: "/page2", component: Page2 },
  { path: "/page4", component: Page4 },
];

export default routes;
