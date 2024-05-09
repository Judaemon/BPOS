import { usePage } from '@inertiajs/react';

export function hasRole(role) {
  return usePage().props.auth.roles && usePage().props.auth.roles.includes(role);
}
