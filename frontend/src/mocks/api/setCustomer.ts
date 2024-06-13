import { SetCustomerResponse } from "@/interfaces/Responses/SetCustomer";
import Chance from "chance";

export const setCustomerResponse = {
  id: "C" + new Chance().natural({ min: 10000, max: 9999999 }),
} as SetCustomerResponse;
