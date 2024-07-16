import Chance from "chance";
import { Area } from "@/interfaces/Common/Area";
import { GetAreaResponse } from "@/interfaces/Responses/GetArea";

export const getAreaResponse = {
  areas: generateArea(),
} as GetAreaResponse;

/**
 * Generate random area data
 *
 * @returns {Area[]} random area data
 */
function generateArea(): Area[] {
  const areas = [];
  const chance = new Chance();
  for (let i = 0; i <= chance.natural({ min: 1, max: 3 }); i++) {
    areas.push({
      id: "A" + chance.natural({ min: 10000, max: 999999 }),
      name: chance.city(),
      depot: chance.province(),
      sales_target: chance.natural({ min: 100, max: 1500 }),
      image: "https://cdn.vuetifyjs.com/images/cards/docks.jpg",
      manager_id: "R" + chance.natural({ min: 10000, max: 999999 }),
      manager_name: chance.name(),
    } as Area);
  }
  return areas;
}
