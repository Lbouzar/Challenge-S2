export function Link(title, link, onClick) {
  const style = {
    color: "cyan",
    textDecoration: "none",
    cursor: "pointer",
  };

  const events = onClick ? { click: onClick } : null;

  return {
    type: "a",
    attributes: {
      href: link,
      style: style,
    },
    events: events,
    children: [title],
  };
}
