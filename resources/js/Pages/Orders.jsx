import { OrderDataTable } from '@/Components/Order/OrderDataTable';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { OrderColumn } from '@/Components/Order/OrderColumns';
import { Head } from '@inertiajs/react';
import { useState } from 'react';

export default function Products({ auth, products }) {
  const [selectProduct, setSelectProduct] = useState([]);

  return (
    <AuthenticatedLayout
      user={auth.user}
      header={
        <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Orders
        </h2>
      }
    >
      <Head title="Orders" />

      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="p-6 space-y-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div className="text-gray-900 dark:text-gray-100">Orders!</div>
            <div className="flex justify-between">
              <p>list of items added to cart</p>
              <p>receipt here</p>
            </div>
            <OrderDataTable columns={OrderColumn} data={products} />
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
