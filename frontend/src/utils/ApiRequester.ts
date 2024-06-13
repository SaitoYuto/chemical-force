import axios, {
  AxiosError,
  AxiosResponse,
  type AxiosRequestConfig,
} from "axios";
import type { ApiCommonParam } from "@/interfaces/Requests/ApiCommonParam";
import type { ApiErrorData } from "@/interfaces/Responses/ApiErrorData";

/**
 * API Request Base class
 *
 * P: Parameter
 * R: Response
 */
export default class ApiRequester<P, R> {
  // API Version
  private apiVersion = "1.0";

  // API Timeout
  private timeout = 50000;

  /**
   * getter for base url
   *
   * @returns base url
   */
  get baseUrl(): string {
    const endpoint = import.meta.env.DEV
      ? location.origin
      : process.env.BASE_URL;
    return endpoint + "/api/";
  }

  /**
   * build merged parameter with common parameter and each parameter
   *
   * @param param each API parameter
   * @returns merged parameter
   */
  private buildParam(param: P): P & ApiCommonParam {
    return { ...{ api_version: this.apiVersion }, ...param };
  }

  /**
   * API request call
   *
   * @param name api name
   * @param param api param
   * @param onSuccess callback function on success
   * @param onError callback function on error
   */
  public async call(
    name: string,
    param: P,
    onSuccess?: (responseData: R) => void,
    onError?: (responseData: ApiErrorData) => void
  ): Promise<R> {
    const url = this.baseUrl + name;
    const config: AxiosRequestConfig = {
      timeout: this.timeout,
    };
    const requestParam = this.buildParam(param);
    return axios
      .post<R, AxiosResponse<R>, P>(url, requestParam, config)
      .then((response: AxiosResponse<R>) => {
        const responseData = response.data;
        if (onSuccess) {
          onSuccess(responseData);
        }
        return responseData;
      })
      .catch((error: AxiosError<ApiErrorData>) => {
        if (error.response && onError) {
          const errorData = error.response.data;
          onError(errorData);
        }
        return Promise.reject(error);
      });
  }
}
