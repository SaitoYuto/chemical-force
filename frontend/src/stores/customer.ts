import { Customer } from "@/interfaces/Common/Customer";
import { AddCustomerRequest } from "@/interfaces/Requests/AddCustomer";
import { DeleteCustomerRequest } from "@/interfaces/Requests/DeleteCustomer";
import { GetCustomerRequest } from "@/interfaces/Requests/GetCustomer";
import { SetCustomerRequest } from "@/interfaces/Requests/SetCustomer";
import { AddCustomerResponse } from "@/interfaces/Responses/AddCustomer";
import { DeleteCustomerResponse } from "@/interfaces/Responses/DeleteCustomer";
import { GetCustomerResponse } from "@/interfaces/Responses/GetCustomer";
import { SetCustomerResponse } from "@/interfaces/Responses/SetCustomer";
import { useUserStore } from "@/stores/user";
import ApiRequester from "@/utils/ApiRequester";
import { defineStore } from "pinia";

/**
 * Customer store.
 */
export const useCustomerStore = defineStore("customer", {
  state: () => {
    return {
      customers: [] as Customer[],
      user: useUserStore(),
    };
  },
  getters: {
    getCustomers: (state): Customer[] => {
      return state.customers;
    },
  },
  actions: {
    async fetch() {
      try {
        const response = await new ApiRequester<
          GetCustomerRequest,
          GetCustomerResponse
        >().post("getCustomer", {
          id: this.user.getId,
        });
        this.customers = response.data.customers;
      } catch (error) {
        throw error;
      }
    },
    async add(customer: Customer) {
      try {
        await new ApiRequester<AddCustomerRequest, AddCustomerResponse>().post(
          "addCustomer",
          {
            ...customer,
            sales_rep_id: this.user.getId,
          }
        );
        this.customers.unshift(customer);
      } catch (error) {
        throw error;
      }
    },
    async update(customer: Customer) {
      try {
        await new ApiRequester<SetCustomerRequest, SetCustomerResponse>().post(
          "setCustomer",
          customer
        );
        this.customers = this.customers.map((target) =>
          target.id == customer.id ? customer : target
        );
      } catch (error) {
        throw error;
      }
    },
    async delete(customerId: string) {
      try {
        await new ApiRequester<
          DeleteCustomerRequest,
          DeleteCustomerResponse
        >().post("deleteCustomer", {
          id: customerId,
        });
        this.customers = this.customers.filter(
          (customer) => customer.id !== customerId
        );
      } catch (error) {
        throw error;
      }
    },
  },
});
