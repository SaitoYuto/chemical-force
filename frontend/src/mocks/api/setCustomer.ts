import { SetCustomerResponse } from "@/interfaces/Responses/SetCustomer";
import { HttpResponse } from "msw";
import Chance from "chance";

export default HttpResponse.json({
  id: "R" + new Chance().natural({ min: 10000, max: 9999999 }),
} as SetCustomerResponse);
