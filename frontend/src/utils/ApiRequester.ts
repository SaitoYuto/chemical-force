import axios, { AxiosError, AxiosInstance, AxiosResponse } from "axios";
import type { ApiCommonParam } from "@/interfaces/Requests/ApiCommonParam";
import type { ApiErrorData } from "@/interfaces/Responses/ApiErrorData";
import { useUserStore } from "@/stores/user";

/**
 * API Request Base class
 *
 * P: Request Parameter Type
 * R: Response Parameter Type
 */
export default class ApiRequester<P, R> {
  // API Version
  static readonly VERSION: string = "1.0";

  // API Timeout
  static readonly TIMEOUT: number = 50000;

  // API End point
  static readonly END_POINT: string = "/api/";

  // Axios client Instance
  private client: AxiosInstance;

  /**
   * Constructor where setting interceptor.
   */
  constructor() {
    this.client = axios.create({
      baseURL: this.baseUrl,
      timeout: ApiRequester.TIMEOUT,
      headers: { "Content-Type": "application/json" },
    });

    this.client.interceptors.request.use((config) => {
      const token = useUserStore().getToken;
      if (token) {
        config.headers.Authorization = `Bearer ${token}`;
      }
      return config;
    });

    this.client.interceptors.response.use(
      (response: AxiosResponse<R>) => {
        return response;
      },
      (error: AxiosError<ApiErrorData>) => {
        if (error.response && error.response.data.errors) {
          const errorData: ApiErrorData = error.response.data;
          return Promise.reject(errorData);
        }
        console.error("Implementation Error");
        return Promise.reject(error);
      }
    );
  }

  /**
   * getter for base url
   *
   * @returns base url
   */
  get baseUrl(): string {
    return import.meta.env.DEV
      ? location.origin + ApiRequester.END_POINT
      : import.meta.env.VITE_BASE_URL + ApiRequester.END_POINT;
  }

  /**
   * build merged parameter with common parameter and each parameter
   *
   * @param param API request parameter
   * @returns merged parameter
   */
  private buildParam(param: P): P & ApiCommonParam {
    return { ...{ api_version: ApiRequester.VERSION }, ...param };
  }

  /**
   * API request call
   *
   * @param api API name
   * @param param API parameter
   * @returns API response
   */
  public async post(api: string, param: P) {
    try {
      return this.client.post<R, AxiosResponse<R>, P>(
        api,
        this.buildParam(param)
      );
    } catch (error) {
      console.error(`Error occurred during API request to ${api}:`, error);
      throw error;
    }
  }
}
