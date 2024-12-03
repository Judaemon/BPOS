import { apiClient } from '@/bootstrap';

export async function fetchExportSales(params) {
  const response = await apiClient.get('/sale/export', {
    params: params,
    responseType: 'blob',
  });

  return response;
}

export async function fetchYearlySalesReport(params) {
  const response = await apiClient.get('/sale/yearly-report', {
    params: params,
  });

  return response.data;
}
