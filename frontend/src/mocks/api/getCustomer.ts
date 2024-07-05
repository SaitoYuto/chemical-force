import { Customer } from "@/interfaces/Common/Customer";
import { GetCustomerResponse } from "@/interfaces/Responses/GetCustomer";
import Chance from "chance";

export const getCustomerResponse = {
  customers: generateCustomer(),
} as GetCustomerResponse;

/**
 * Generate random customer data
 *
 * @returns {Customer[]} random customer data
 */
function generateCustomer(): Customer[] {
  const chance = new Chance();
  const customers = [];
  for (let i = 0; i <= chance.natural({ min: 8, max: 20 }); i++) {
    customers.push({
      id: "C" + chance.natural({ min: 100000, max: 9999999 }),
      honorific: chance.prefix(),
      first_name: chance.first(),
      last_name: chance.last(),
      house_number: chance.postcode(),
      street: chance.street(),
      account: chance.natural({ min: 100000, max: 999999 }) + "",
    } as Customer);
  }
  return customers;
}
