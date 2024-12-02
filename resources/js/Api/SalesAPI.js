import { apiClient } from '@/bootstrap';

export async function fetchExportSales(params) {
  const response = await apiClient.get('/sale/export', {
    params: params,
    responseType: 'blob',
  });

  return response;
}
