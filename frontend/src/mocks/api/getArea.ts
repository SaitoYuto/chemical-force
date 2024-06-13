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
      id: chance.string({ length: 8, alpha: true, numeric: true }),
      name: chance.city(),
      depot: chance.province(),
      salesTarget: chance.natural({ min: 100, max: 1500 }),
    } as Area);
  }
  return areas;
}
