import { DataTable } from '@/Components/Products/DataTable';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@/shadcn/ui/button';
import { Head } from '@inertiajs/react';

import { columns } from '@/Components/Products/ProductsColumns';

export default function Products({ auth }) {
  const data = [
    {
      "id": 1,
      "name": 'Product 1',
      "price": 500,
    },
    {
      "id": 2,
      "name": 'Product 2',
      "price": 1000,
    },
  ];

  return (
    <AuthenticatedLayout
      user={auth.user}
      header={
        <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Products
        </h2>
      }
    >
      <Head title="Dashboard" />

      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="p-6 space-y-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div className="text-gray-900 dark:text-gray-100">Products!</div>

            <DataTable columns={columns} data={data} />
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
