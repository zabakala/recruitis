export function buildSeo(val: string, delimiter = '-') {
  return val
    .replace(/ /g, delimiter)
    .replace(/\//g, delimiter)
    .replace(/\\/g, delimiter)
    .replace(/,/g, delimiter)
}

export function replaceAccents(val: string) {
  return val.normalize('NFD').replace(/[\u0300-\u036f]/g, "")
}
