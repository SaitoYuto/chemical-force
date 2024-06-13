import { http } from "msw";
import deleteCustomer from "@/mocks/api/deleteCustomer";
import getArea from "@/mocks/api/getArea";
import getInformation from "@/mocks/api/getInformation";
import getUserDeal from "@/mocks/api/getUserDeal";
import login from "@/mocks/api/login";
import setCustomer from "@/mocks/api/setCustomer";

export const handlers = [
  http.post("/api/getArea", () => {
    return getArea;
  }),
  http.post("/api/getInformation", () => {
    return getInformation;
  }),
  http.post("/api/getUserDeal", () => {
    return getUserDeal;
  }),
  http.post("/api/setCustomer", () => {
    return setCustomer;
  }),
  http.post("/api/deleteCustomer", () => {
    return deleteCustomer;
  }),
  http.post("/api/login", () => {
    return login;
  }),
];
