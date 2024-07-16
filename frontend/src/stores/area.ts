import { Area } from "@/interfaces/Common/Area";
import { GetAreaRequest } from "@/interfaces/Requests/GetArea";
import { GetAreaResponse } from "@/interfaces/Responses/GetArea";
import { useUserStore } from "@/stores/user";
import ApiRequester from "@/utils/ApiRequester";
import { defineStore } from "pinia";

/**
 * Area store.
 */
export const useAreaStore = defineStore("area", {
  state: () => {
    return {
      areas: [] as Area[],
      user: useUserStore(),
    };
  },
  getters: {
    getAreas: (state): Area[] => {
      return state.areas;
    },
  },
  actions: {
    async fetch() {
      try {
        const response = await new ApiRequester<
          GetAreaRequest,
          GetAreaResponse
        >().post("getArea", {
          id: this.user.getId,
        });
        this.areas = response.data.areas;
      } catch (error) {
        throw error;
      }
    },
  },
});
