import Chance from "chance";
import { Information } from "@/interfaces/Common/Information";
import { GetInformationResponse } from "@/interfaces/Responses/GetInformation";
import { HttpResponse } from "msw";

export default HttpResponse.json({
  information: initInfos(),
} as GetInformationResponse);

/**
 * Generate random information data
 *
 * @returns {Information[]} random information data
 */
function initInfos(): Information[] {
  const infos = [];
  const chance = new Chance();
  for (let i = 0; i <= chance.natural({ min: 1, max: 10 }); i++) {
    infos.push({
      id: chance.string({ length: 8, alpha: true, numeric: true }),
      title: chance.sentence({ words: 5 }),
      content: chance.paragraph(),
    } as Information);
  }
  return infos;
}
