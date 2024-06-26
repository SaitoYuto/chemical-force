/**
 * SetCustomer request interface.
 *
 * @author Yuto Saito
 */
export interface SetCustomerRequest {
  id: string;
  honorific: string;
  first_name: string;
  last_name: string;
  house_number: string;
  street: string;
  account: string;
}
