import { apiClient } from '@/bootstrap';

export const updateUserPassword = async (params, id) => {
  const response = await apiClient.post(`/users/${id}/update-password`, {
    ...params,
  });

  return response.data;
};