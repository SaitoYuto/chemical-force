/**
 * SetProduct request interface.
 *
 * @author Yuto Saito
 */
export interface SetProductRequest {
  id: string;
  name: string;
  desc: string;
  price: number;
  volume: number;
  unit: string;
}
