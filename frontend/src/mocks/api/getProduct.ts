import { Product } from "@/interfaces/Common/Product";
import { GetProductResponse } from "@/interfaces/Responses/GetProduct";
import Chance from "chance";

export const getProductResponse = {
  products: generateProduct(),
} as GetProductResponse;

/**
 * Generate random product data
 *
 * @returns {Product[]} random product data
 */
function generateProduct(): Product[] {
  const chance = new Chance();
  const products = [];
  for (let i = 0; i <= chance.natural({ min: 8, max: 20 }); i++) {
    products.push({
      id: "P" + chance.natural({ min: 100000, max: 9999999 }),
      name: chance.string({ length: 8 }),
      description: chance.paragraph({ sentences: 2 }),
      price: chance.natural({ min: 100, max: 2500 }),
      volume: chance.natural({ min: 10, max: 999 }),
      unit: chance.pickone(["gallon", "little"]),
    } as Product);
  }
  return products;
}
