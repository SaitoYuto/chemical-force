<template>
  <v-data-table :headers="CUSTOMER_HEADER" :items="customerData">
    <template v-slot:top>
      <FormDialog
        title="Customer Information"
        v-model:formData="clickedRow"
        v-model:visibility="editDialog"
        @update="updateCustomer"
      ></FormDialog>
      <BaseDialog
        v-model:visibility="deleteDialog"
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
        @click="showEditDialog(items.item)"
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
import { MESSAGE } from "@/constants/Message";
import { CUSTOMER_HEADER } from "@/constants/TableHeader";
import { UI } from "@/constants/UI";
import { Customer } from "@/interfaces/Common/Customer";
import { DeleteCustomerRequest } from "@/interfaces/Requests/DeleteCustomer";
import { SetCustomerRequest } from "@/interfaces/Requests/SetCustomer";
import { DeleteCustomerResponse } from "@/interfaces/Responses/DeleteCustomer";
import { SetCustomerResponse } from "@/interfaces/Responses/SetCustomer";
import ApiRequester from "@/utils/ApiRequester";

// Initial clicked customer data
const clickedRow = ref<Customer>({
  id: "",
  honorific: "",
  firstName: "",
  lastName: "",
  houseNo: "",
  street: "",
  accountNo: "",
});
const editDialog = ref(false);
const deleteDialog = ref(false);

defineProps({
  customerData: {
    type: Array as PropType<Customer[]>,
    required: false,
    default: [],
  },
});

/**
 * Show edit dialog
 *
 * @param {Customer} row
 * @returns {void}
 * @author Yuto Saito
 */
function showEditDialog(row: Customer): void {
  editDialog.value = true;
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
      firstName: clickedRow.value.firstName,
      lastName: clickedRow.value.lastName,
      houseNo: clickedRow.value.houseNo,
      street: clickedRow.value.street,
      accountNo: clickedRow.value.accountNo,
    },
    (response) => {
      console.log(response.id);
      editDialog.value = false;
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
  deleteDialog.value = true;
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
      console.log(response.id);
      deleteDialog.value = false;
    },
    (apiError) => {
      console.log(...apiError.errors);
    }
  );
}
</script>
