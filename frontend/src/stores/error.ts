import { defineStore } from "pinia";

export const useErrorStore = defineStore("error", {
  state: () => {
    return {
      keys: [] as string[],
      map: new Map<string, string[]>(),
    };
  },
  getters: {
    hasError: (state): boolean => {
      return state.keys.length > 0 && state.map.size > 0;
    },
    getMessages: (state) => {
      return (key: string) => state.map.get(key) ?? [];
    },
  },
  actions: {
    setError(key: string, messages: string[]): void {
      if (!this.keys.includes(key)) {
        this.keys.push(key);
      }
      // update messages even if key existed
      this.map.set(key, messages);
    },
    hasKey(key: string): boolean {
      return this.keys.includes(key) && this.map.has(key);
    },
    remove(key: string): void {
      const index = this.keys.indexOf(key);
      if (index > -1) {
        this.keys.splice(index, 1);
        this.map.delete(key);
      }
    },
  },
});
