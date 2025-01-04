import { apiClient } from '@/bootstrap';

export const fetchProducts = async (params) => {
  const response = await apiClient.get('/products/list', {
    params: params,
  });

  return response.data;
};

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
