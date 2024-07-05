/**
 * AddCustomer response parameter interface.
 *
 * @author Yuto Saito
 */
export interface AddCustomerResponse {
  id: string;
  honorific: string;
  first_name: string;
  last_name: string;
  house_number: string;
  street: string;
  account: string;
  sales_rep_id: string;
}
