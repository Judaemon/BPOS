import { SalesColumns } from '@/Components/Sale/SaleColumns';
import { SaleDataTable } from '@/Components/Sale/SaleDataTable';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';


export default function Products({ auth, sales }) {

  return (
    <AuthenticatedLayout
      user={auth.user}
      header={
        <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Sales
        </h2>
      }
    >
      <Head title="Dashboard" />

      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="p-6 space-y-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div className="text-gray-900 dark:text-gray-100">Sales!</div>

            <SaleDataTable columns={SalesColumns} data={sales} />
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
