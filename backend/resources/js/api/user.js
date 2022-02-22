import request from "@/utils/request"

export function getCsrfCookie() {
  return request({
    url: '/sanctum/csrf-cookie',
    method: "get"
  })
}

export function login(data) {
  return request({
    url: '/login',
    method: "post",
    data:data
  })
}

export function logout() {
  return request({
    url: '/logout',
    method: "post"
  })
}

export function getInfo() {
  return request({
    url: '/user',
    method: "get"
  })
}
