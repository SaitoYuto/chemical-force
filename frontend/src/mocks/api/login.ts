import { LoginResponse } from "@/interfaces/Responses/Login";
import { HttpResponse } from "msw";
import Chance from "chance";

const chance = new Chance();

export default HttpResponse.json({
  id: "R" + chance.natural({ min: 10000, max: 9999999 }),
  name: chance.name(),
  token: chance.hash(),
  isSupervisor: chance.bool(),
  isChiefManager: chance.bool(),
} as LoginResponse);
