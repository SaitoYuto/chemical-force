import { ApiErrorData } from "@/interfaces/Responses/ApiErrorData";

export function isApiErrorData(obj: unknown): obj is ApiErrorData {
  return (
    typeof obj === "object" &&
    obj !== null &&
    "errors" in obj &&
    Array.isArray((obj as ApiErrorData).errors)
  );
}
