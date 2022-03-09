import request from "@/utils/request"

export function fetchList(date) {
  return request({
    url: '/movie',
    method: "get",
    parames:date
  })
}
