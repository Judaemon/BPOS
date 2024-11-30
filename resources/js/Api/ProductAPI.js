import { apiClient } from '@/bootstrap';

export async function fetchExportProduct(params) {
  const response = await apiClient.get('/products/export', {
    params: params,
    responseType: 'blob',
  });

  return response;
}
