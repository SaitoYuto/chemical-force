import { defineStore } from "pinia";
import { useLocalStorage } from "@vueuse/core";

/**
 * User store.
 */
export const useUserStore = defineStore("user", {
  state: () => {
    return {
      id: useLocalStorage("user_id", ""),
      name: useLocalStorage("user_name", ""),
      token: useLocalStorage("user_token", ""),
      supervisorId: "",
    };
  },
  getters: {
    getId: (state): string => {
      return state.id;
    },
    getName: (state): string => {
      return state.name;
    },
    getFirstName: (state): string => {
      return state.name.substring(0, state.name.indexOf(" "));
    },
    getToken: (state): string => {
      return state.token;
    },
    isSupervisor: (state): boolean => {
      return state.id == state.supervisorId;
    },
    isLoggedIn: (state): boolean => {
      return (
        state.id.length > 0 && state.name.length > 0 && state.token.length > 0
      );
    },
  },
});
