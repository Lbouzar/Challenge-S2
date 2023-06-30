export function matchPath(pathname, routePath) {
  const pathSegments = pathname.split("/").filter(Boolean);
  const routeSegments = routePath.split("/").filter(Boolean);

  if (pathSegments.length !== routeSegments.length) {
    return false;
  }

  for (let i = 0; i < pathSegments.length; i++) {
    const isParam = routeSegments[i].startsWith(":");
    if (isParam) {
      continue;
    }

    if (pathSegments[i] !== routeSegments[i]) {
      return false;
    }
  }

  return true;
}
