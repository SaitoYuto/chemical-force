/**
 * AddProduct response parameter interface.
 *
 * @author Yuto Saito
 */
export interface AddProductResponse {
  id: string;
  name: string;
  description: string;
  price: number;
  volume: number;
  unit: string;
  sales_rep_id: string;
}
