<template>
  <v-data-table :headers="CUSTOMER_HEADER" :items="customerData">
    <template v-slot:top>
      <FormDialog
        ref="formDialog"
        v-model:formData="clickedRow"
        @update="updateCustomer"
      ></FormDialog>
      <BaseDialog
        ref="deleteDialog"
        :text="MESSAGE.ENQUIRY.DELETE"
        @ok="deleteCustomer"
      ></BaseDialog>
    </template>
    <template v-slot:headers="{ columns }">
      <tr>
        <template v-for="column in columns" :key="column.key">
          <th>
            <span>{{ column.title }}</span>
          </th>
        </template>
      </tr>
    </template>
    <template v-slot:item.actions="items">
      <v-icon
        :icon="UI.ICON.PENCIL"
        class="me-6"
        @click="showFormDialog(items.item)"
      >
      </v-icon>
      <v-icon
        :icon="UI.ICON.DELETE"
        class="ml-6"
        @click="showDeleteDialog()"
      ></v-icon>
    </template>
  </v-data-table>
</template>

<script lang="ts" setup>
import FormDialog from "@/components/FormDialog.vue";
import BaseDialog from "@/components/BaseDialog.vue";
import { MESSAGE } from "@/constants/Message";
import { CUSTOMER_HEADER } from "@/constants/TableHeader";
import { UI } from "@/constants/UI";
import { Customer } from "@/interfaces/Common/Customer";
import { DeleteCustomerRequest } from "@/interfaces/Requests/DeleteCustomer";
import { SetCustomerRequest } from "@/interfaces/Requests/SetCustomer";
import { DeleteCustomerResponse } from "@/interfaces/Responses/DeleteCustomer";
import { SetCustomerResponse } from "@/interfaces/Responses/SetCustomer";
import ApiRequester from "@/utils/ApiRequester";

defineProps({
  customerData: {
    type: Array as PropType<Customer[]>,
    required: false,
    default: [],
  },
});

const formDialog = ref<InstanceType<typeof FormDialog> | null>(null);
const deleteDialog = ref<InstanceType<typeof BaseDialog> | null>(null);
// Initial clicked customer data
const clickedRow = ref<Customer>({
  id: "",
  honorific: "",
  first_name: "",
  last_name: "",
  house_number: "",
  street: "",
  account: "",
});

/**
 * Show edit dialog
 *
 * @param {Customer} row
 * @returns {void}
 * @author Yuto Saito
 */
function showFormDialog(row: Customer): void {
  formDialog.value?.open(row);
  clickedRow.value = row;
}

/**
 * Send update customer request
 *
 * @returns {void}
 * @author Yuto Saito
 */
function updateCustomer(): void {
  new ApiRequester<SetCustomerRequest, SetCustomerResponse>().call(
    "setCustomer",
    {
      id: clickedRow.value.id,
      honorific: clickedRow.value.honorific,
      first_name: clickedRow.value.first_name,
      last_name: clickedRow.value.last_name,
      house_number: clickedRow.value.house_number,
      street: clickedRow.value.street,
      account: clickedRow.value.account,
    },
    (response) => {
      formDialog.value?.close();
    },
    (apiError) => {
      console.log(...apiError.errors);
    }
  );
}

/**
 * Show delete dialog
 *
 * @returns {void}
 * @author Yuto Saito
 */
function showDeleteDialog(): void {
  deleteDialog.value?.open();
}

/**
 * Send delete customer request
 *
 * @returns {void}
 * @author Yuto Saito
 */
function deleteCustomer(): void {
  new ApiRequester<DeleteCustomerRequest, DeleteCustomerResponse>().call(
    "deleteCustomer",
    { id: clickedRow.value.id },
    (response) => {
      deleteDialog.value?.close();
    },
    (apiError) => {
      console.log(...apiError.errors);
    }
  );
}
</script>
