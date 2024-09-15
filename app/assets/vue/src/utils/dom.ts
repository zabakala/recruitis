export function getDomElement(selector: string) {
  return document.querySelector(selector)
}

export function getDomElementAttribute(selector: string, attr: string, rmAttr = true) {
  const elm = getDomElement(selector)

  const data = elm?.getAttribute(attr)
  if (rmAttr) elm?.removeAttribute(attr)

  return data
}

export function reloadWindow() {
  window.location.reload()
}
