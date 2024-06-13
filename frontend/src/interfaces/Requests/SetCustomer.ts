/**
 * SetCustomer request interface.
 *
 * @author Yuto Saito
 */
export interface SetCustomerRequest {
  id: string;
  honorific: string;
  firstName: string;
  lastName: string;
  houseNo: string;
  street: string;
  accountNo: string;
}
