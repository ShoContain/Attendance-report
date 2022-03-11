import request from "@/utils/request"

export function fetchList(query) {
  console.log(query)
  return request({
    url: "/movie",
    method: "get",
    params: query,
  })
}
