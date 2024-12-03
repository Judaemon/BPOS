import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { TrendingUp } from 'lucide-react';
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
                <YearlySalesChart
                  data={[]}
                  footerContent={
                    <div>
                      <div className="flex gap-2 font-medium leading-none">
                        Trending up by 2.3% this month <TrendingUp className="h-4 w-4" />
                      </div>
                      <div className="leading-none text-muted-foreground">
                        Showing total sales from May to Sept
                      </div>
                    </div>
                  }
                />
              </div>
            )}
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
