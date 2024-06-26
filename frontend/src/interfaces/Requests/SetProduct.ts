/**
 * SetProduct request interface.
 *
 * @author Yuto Saito
 */
export interface SetProductRequest {
  id: string;
  name: string;
  description: string;
  price: number;
  volume: number;
  unit: string;
}
