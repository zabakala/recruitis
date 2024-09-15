import {Method} from "@/api/enum.ts";

export function fetchData<T>(url: string, method: Method, body?: T) {
  const options: RequestInit = { method }
  if (body) options.body = JSON.stringify(body)

  return fetch(url, options)
}

export function post<T>(url: string, body?: T) {
  return fetchData<T>(url, Method.Post, body)
}
