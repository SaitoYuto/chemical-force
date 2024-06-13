/**
 * Login response parameter interface.
 *
 * @author Yuto Saito
 */
export interface LoginResponse {
  id: string;
  name: string;
  token: string;
  isSupervisor: boolean;
  isChiefManager: boolean;
}
