import { DeleteProductResponse } from "@/interfaces/Responses/DeleteProduct";
import Chance from "chance";

export const deleteProductResponse = {
  id: "P" + new Chance().natural({ min: 10000, max: 9999999 }),
} as DeleteProductResponse;
