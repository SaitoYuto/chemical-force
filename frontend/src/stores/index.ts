// Utilities
import { createPinia } from "pinia";
import { useErrorStore } from "@/stores/error";
import { isApiErrorData } from "@/utils/isApiErrorData";

export default createPinia().use(({ store }) => {
  store.$onAction(({ store, name, args, after, onError }) => {
    onError((result) => {
      const errorStore = useErrorStore();
      if (
        isApiErrorData(result) &&
        !errorStore.hasKey(`${store.$id}-${name}`)
      ) {
        errorStore.setError(`${store.$id}-${name}`, result.errors);
      }
    });
  });
});
