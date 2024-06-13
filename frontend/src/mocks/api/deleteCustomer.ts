import { DeleteCustomerResponse } from "@/interfaces/Responses/DeleteCustomer";
import { HttpResponse } from "msw";
import Chance from "chance";

export default HttpResponse.json({
  id: "R" + new Chance().natural({ min: 10000, max: 9999999 }),
} as DeleteCustomerResponse);
