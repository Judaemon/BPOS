import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { MonthlySalesChart } from '@/Components/Sale/Charts/MonthlySalesChart';
import OutOfStockTable from '@/Components/Products/OutOfStockTable';
import { TrendingProductList } from '@/Components/Sale/Charts/TrendingProductList';
import { YearlySalesChart } from '../Components/Sale/Charts/YearlySalesChart';
import { hasRole } from '@/lib/permissions';

export default function Dashboard({ auth }) {
  return (
    <AuthenticatedLayout
      user={auth.user}
      header={
        <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Dashboard
        </h2>
      }
    >
      <Head title="Dashboard" />

      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="bg-white p-6 grid gap-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            {hasRole('admin') && (
              <div className="grid gap-4 text-black">
                <div className="flex gap-4 justify-between">
                  <div className="w-2/3">
                    <TrendingProductList />
                  </div>

                  <div className="w-1/3">
                    <OutOfStockTable />
                  </div>
                </div>
                <YearlySalesChart />

                <MonthlySalesChart />
              </div>
            )}
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
