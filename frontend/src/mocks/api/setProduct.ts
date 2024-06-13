import { SetProductResponse } from "@/interfaces/Responses/SetProduct";
import Chance from "chance";

export const setProductResponse = {
  id: "C" + new Chance().natural({ min: 10000, max: 9999999 }),
} as SetProductResponse;
