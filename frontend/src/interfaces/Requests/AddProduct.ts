/**
 * AddProduct request interface.
 *
 * @author Yuto Saito
 */
export interface AddProductRequest {
  id: string;
  name: string;
  description: string;
  price: number;
  volume: number;
  unit: string;
  sales_rep_id: string;
}
