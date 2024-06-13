import { Customer } from "@/interfaces/Common/Customer";
import { Product } from "@/interfaces/Common/Product";
import { GetUserDealResponse } from "@/interfaces/Responses/GetUserDeal";
import Chance from "chance";

const chance = new Chance();

export const getUserDealResponse = {
  customers: generateCustomer(),
  products: generateProduct(),
} as GetUserDealResponse;

/**
 * Generate random customer data
 *
 * @returns {Customer[]} random customer data
 */
function generateCustomer(): Customer[] {
  const customers = [];
  for (let i = 0; i <= chance.natural({ min: 1, max: 20 }); i++) {
    customers.push({
      id: "C" + chance.natural({ min: 100000, max: 9999999 }),
      honorific: chance.prefix(),
      firstName: chance.first(),
      lastName: chance.last(),
      houseNo: chance.postcode(),
      street: chance.street(),
      accountNo: chance.natural({ min: 100000, max: 999999 }) + "",
    } as Customer);
  }
  return customers;
}

/**
 * Generate random product data
 *
 * @returns {Product[]} random product data
 */
function generateProduct(): Product[] {
  const products = [];
  for (let i = 0; i <= chance.natural({ min: 1, max: 20 }); i++) {
    products.push({
      id: "P" + chance.natural({ min: 100000, max: 9999999 }),
      name: chance.string({ length: 8 }),
      desc: chance.paragraph({ sentences: 2 }),
      price: chance.natural({ min: 100, max: 2500 }),
      volume: chance.natural({ min: 10, max: 999 }),
      unit: chance.pickone(["gallon", "little"]),
    } as Product);
  }
  return products;
}
