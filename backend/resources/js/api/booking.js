import request from "@/utils/request"

export function find(id) {
  return request({
    url: "booking/" + id,
    method: "get",
  })
}

export function store(data) {
  return request({
    url: "booking",
    method: "post",
    data: data,
  })
}
