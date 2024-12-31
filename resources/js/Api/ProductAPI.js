import { apiClient } from '@/bootstrap';

export async function fetchExportProduct(params) {
  const response = await apiClient.get('/products/export', {
    params: params,
    responseType: 'blob',
  });

  return response;
}

export const fetchOutOfStockProduct = async (params) => {
  const response = await apiClient.get('/products/low-sock', {
    params: params,
  });

  return response.data;
};
