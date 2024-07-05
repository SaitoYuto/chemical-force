import { Product } from "@/interfaces/Common/Product";
import { AddProductRequest } from "@/interfaces/Requests/AddProduct";
import { DeleteProductRequest } from "@/interfaces/Requests/DeleteProduct";
import { GetProductRequest } from "@/interfaces/Requests/GetProduct";
import { SetProductRequest } from "@/interfaces/Requests/SetProduct";
import { AddProductResponse } from "@/interfaces/Responses/AddProduct";
import { DeleteProductResponse } from "@/interfaces/Responses/DeleteProduct";
import { GetProductResponse } from "@/interfaces/Responses/GetProduct";
import { SetProductResponse } from "@/interfaces/Responses/SetProduct";
import { useUserStore } from "@/stores/user";
import ApiRequester from "@/utils/ApiRequester";
import { defineStore } from "pinia";

/**
 * Product store.
 */
export const product = defineStore("product", {
  state: () => {
    return {
      products: [] as Product[],
      user: useUserStore(),
    };
  },
  getters: {
    getProducts: (state): Product[] => {
      return state.products;
    },
  },
  actions: {
    async fetch() {
      await new ApiRequester<GetProductRequest, GetProductResponse>()
        .post("getProduct", {
          id: this.user.getId,
        })
        .then((res) => (this.products = res.data.products));
    },
    async add(product: Product) {
      await new ApiRequester<AddProductRequest, AddProductResponse>()
        .post("addProduct", {
          ...product,
          sales_rep_id: this.user.getId,
        })
        .then(() => this.products.unshift(product));
    },
    async update(product: Product) {
      await new ApiRequester<SetProductRequest, SetProductResponse>()
        .post("setProduct", product)
        .then(() => {
          this.products = this.products.map((target) =>
            target.id == product.id ? product : target
          );
        });
    },
    async delete(productId: string) {
      await new ApiRequester<DeleteProductRequest, DeleteProductResponse>()
        .post("deleteProduct", {
          id: productId,
        })
        .then(() => {
          this.products = this.products.filter(
            (product) => product.id !== productId
          );
        });
    },
  },
});
