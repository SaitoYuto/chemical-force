import { http, HttpResponse } from "msw";
import { deleteCustomerResponse } from "@/mocks/api/deleteCustomer";
import { deleteProductResponse } from "@/mocks/api/deleteProduct";
import { getAreaResponse } from "@/mocks/api/getArea";
import { getInformationResponse } from "@/mocks/api/getInformation";
import { getUserDealResponse } from "@/mocks/api/getUserDeal";
import { loginResponse } from "@/mocks/api/login";
import { setCustomerResponse } from "@/mocks/api/setCustomer";
import { setProductResponse } from "@/mocks/api/setProduct";

export const handlers = [
  http.post("/api/deleteCustomer", () => {
    return HttpResponse.json(deleteCustomerResponse);
  }),
  http.post("/api/deleteProduct", () => {
    return HttpResponse.json(deleteProductResponse);
  }),
  http.post("/api/getArea", () => {
    return HttpResponse.json(getAreaResponse);
  }),
  http.post("/api/getInformation", () => {
    return HttpResponse.json(getInformationResponse);
  }),
  http.post("/api/getUserDeal", () => {
    return HttpResponse.json(getUserDealResponse);
  }),
  http.post("/api/login", () => {
    return HttpResponse.json(loginResponse);
  }),
  http.post("/api/setCustomer", () => {
    return HttpResponse.json(setCustomerResponse);
  }),
  http.post("/api/setProduct", () => {
    return HttpResponse.json(setProductResponse);
  }),
];
