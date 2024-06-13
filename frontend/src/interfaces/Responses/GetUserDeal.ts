import { Customer } from "@/interfaces/Common/Customer";
import { Product } from "@/interfaces/Common/Product";

/**
 * GetUserDeal response parameter interface.
 *
 * @author Yuto Saito
 */
export interface GetUserDealResponse {
  customers: Customer[];
  products: Product[];
}
