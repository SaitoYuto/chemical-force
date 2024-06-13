import { Customer } from "@/interfaces/Common/Customer";
import { Product } from "@/interfaces/Common/Product";
import type { VDataTable } from "vuetify/components";
/**
 * Table header constants.
 *
 * @author Yuto Saito
 */
export const CUSTOMER_HEADER: VDataTable["$props"]["headers"] = [
  {
    key: "id",
    value: "id",
    title: "ID",
  } as const,

  { key: "honorific", value: "honorific", title: "Honorific" } as const,
  {
    key: "fullName",
    value: (customer: Customer) => `${customer.firstName} ${customer.lastName}`,
    title: "Name",
  } as const,
  { key: "houseNo", value: "houseNo", title: "House No" } as const,
  { key: "street", value: "street", title: "Street" } as const,
  { key: "accountNo", value: "accountNo", title: "Account No" } as const,
  { key: "actions" } as const,
] as const;

export const PRODUCT_HEADER: VDataTable["$props"]["headers"] = [
  {
    key: "id",
    value: "id",
    title: "ID",
  } as const,
  {
    key: "name",
    value: "name",
    title: "Name",
  } as const,
  { key: "desc", value: "desc", title: "Description" } as const,
  { key: "price", value: "price", title: "Price(£)" } as const,
  {
    key: "volume",
    value: (product: Product) => `${product.volume} (${product.unit})`,
    title: "Volume",
  } as const,
  { title: "", key: "actions" } as const,
] as const;
