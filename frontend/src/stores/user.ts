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
      supervisorAuth: false,
      chiefManagerAuth: false,
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
    isSupervisor: (state): boolean => {
      return state.supervisorAuth;
    },
    isChiefManager: (state): boolean => {
      return state.chiefManagerAuth;
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
    setSupervisorAuth(supervisorAuth: boolean): void {
      this.supervisorAuth = supervisorAuth;
    },
    setChiefManagerAuth(chiefManagerAuth: boolean): void {
      this.chiefManagerAuth = chiefManagerAuth;
    },
    clear(): void {
      this.setId("");
      this.setName("");
      this.setToken("");
      this.setSupervisorAuth(false);
      this.setChiefManagerAuth(false);
    },
  },
  persist: {
    storage: localStorage,
  },
});
