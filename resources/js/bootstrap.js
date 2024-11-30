import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

export const apiClient = axios.create({
  withCredentials: true, // Include cookies
});
