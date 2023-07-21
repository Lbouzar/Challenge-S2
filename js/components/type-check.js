export function type_check_v1(variable, type) {
  if (variable === null) {
    return variable === null && type === "null";
  }
  if (type === "null") {
    return variable === null;
  } else if (type === "array") {
    return Array.isArray(variable);
  } else if (type === "object") {
    if (Array.isArray(variable)) return false;
    return true;
  } else {
    return typeof variable === type;
  }
}
