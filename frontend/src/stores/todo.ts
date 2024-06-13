import { Todo } from "@/interfaces/Common/Todo";
import { defineStore } from "pinia";

/**
 * Todo store.
 */
export const todo = defineStore("todo", {
  state: () => {
    return {
      todo: [] as Todo[],
    };
  },
  getters: {
    getTodo: (state): Todo[] => {
      return state.todo;
    },
  },
  actions: {
    add(todo: Todo): void {
      this.todo.unshift(todo);
    },
    deleteById(id: string): void {
      this.todo = this.todo.filter((el) => el.id !== id);
    },
  },
  persist: {
    storage: localStorage,
  },
});
