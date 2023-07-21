export default function Button({ title, onClick, style }) {
  const baseStyle = {
    backgroundColor: "grey",
    borderRadius: "5px",
    cursor: "pointer",
    ...style, // Merge the provided style with the base style
  };

  return {
    type: "button",
    attributes: {
      style: baseStyle,
    },
    events: {
      click: onClick,
    },
    children: [title],
  };
}
