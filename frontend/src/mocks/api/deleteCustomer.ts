import { DeleteCustomerResponse } from "@/interfaces/Responses/DeleteCustomer";
import Chance from "chance";

export const deleteCustomerResponse = {
  id: "C" + new Chance().natural({ min: 10000, max: 9999999 }),
} as DeleteCustomerResponse;
