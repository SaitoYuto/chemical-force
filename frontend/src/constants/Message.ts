/**
 * Message constants.
 *
 * @author Yuto Saito
 */
export const MESSAGE = {
  ENQUIRY: {
    DELETE: "Are you sure you want to delete this data?",
    LOGOUT: "Are you sure you want to logout?",
    TODO: "What need to be done today?",
  } as const,
  ERROR: {
    LOGIN: "Login Failed.",
  },
  FIELD: {
    REQUIRED: "Field is required.",
  } as const,
} as const;
