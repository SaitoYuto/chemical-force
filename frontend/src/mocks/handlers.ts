import { http, HttpResponse } from "msw";
import { addCustomerResponse } from "@/mocks/api/addCustomer";
import { addProductResponse } from "@/mocks/api/addProduct";
import { deleteCustomerResponse } from "@/mocks/api/deleteCustomer";
import { deleteProductResponse } from "@/mocks/api/deleteProduct";
// import { errorResponse } from "@/mocks/api/errorResponse";
import { getAreaResponse } from "@/mocks/api/getArea";
import { getCustomerResponse } from "@/mocks/api/getCustomer";
import { getInformationResponse } from "@/mocks/api/getInformation";
import { getProductResponse } from "@/mocks/api/getProduct";
import { getUserDealResponse } from "@/mocks/api/getUserDeal";
import { loginResponse } from "@/mocks/api/login";
import { setCustomerResponse } from "@/mocks/api/setCustomer";
import { setProductResponse } from "@/mocks/api/setProduct";

// NOTE:
// When returning error response, modify `return HttpResponse.json(errorResponse, { status: 500 });`
export const handlers = [
  http.post("/api/addCustomer", () => {
    return HttpResponse.json(addCustomerResponse);
  }),
  http.post("/api/addProduct", () => {
    return HttpResponse.json(addProductResponse);
  }),
  http.post("/api/deleteCustomer", () => {
    return HttpResponse.json(deleteCustomerResponse);
  }),
  http.post("/api/deleteProduct", () => {
    return HttpResponse.json(deleteProductResponse);
  }),
  http.post("/api/getArea", () => {
    return HttpResponse.json(getAreaResponse);
  }),
  http.post("/api/getCustomer", () => {
    return HttpResponse.json(getCustomerResponse);
  }),
  http.post("/api/getInformation", () => {
    return HttpResponse.json(getInformationResponse);
  }),
  http.post("/api/getProduct", () => {
    return HttpResponse.json(getProductResponse);
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
