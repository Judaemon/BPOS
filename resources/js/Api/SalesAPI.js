import { apiClient } from '@/bootstrap';

export async function fetchExportSales(params) {
  const response = await apiClient.get('/sale/export', {
    params: params,
    responseType: 'blob',
  });

  return response;
}

export const fetchYearlySalesReport = async (params) => {
  const response = await apiClient.get('/sale/yearly-report', {
    params: params,
  });

  return response.data;
}

export const fetchMonthlySalesReport = async (params) => {
  const response = await apiClient.get('/sale/monthly-report', {
    params: params,
  });

  return response.data;
}
