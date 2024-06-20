import axios, { type AxiosResponse } from 'axios';

axios.defaults.baseURL = import.meta.env.VITE_APP_API_URL

const request = async <T>(
    method: 'get' | 'post' | 'put' | 'delete',
    url: string,
    data: T | undefined = undefined
): Promise<T> => {
    try {
        const res: AxiosResponse<T> = await axios(url, {
            method,
            headers: {
                'Accept-Encoding': 'application/json',
            },
            params: data && method === 'get' ? data : {},
            data: data && method === 'post' ? data : {}
        })
        return res.data;
    } catch {
        throw new Error(`failed to get data from ${url}`)
    }
}

export { request }