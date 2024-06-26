import { defineStore } from "pinia";

/**
 * User store.
 */
export const user = defineStore("user", {
  state: () => {
    return {
      id: "",
      name: "",
      token: "",
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
  actions: {
    setId(id: string): void {
      this.id = id;
    },
    setName(name: string): void {
      this.name = name;
    },
    setToken(token: string): void {
      this.token = token;
    },
    setSupervisorId(supervisorId: string): void {
      this.supervisorId = supervisorId;
    },

    clear(): void {
      this.setId("");
      this.setName("");
      this.setToken("");
      this.setSupervisorId("");
    },
  },
  persist: {
    storage: localStorage,
  },
});
