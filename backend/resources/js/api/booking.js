import request from "@/utils/request"

export function find(id) {
  return request({
    url: "booking/" + id,
    method: "get",
  })
}
