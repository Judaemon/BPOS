import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@/shadcn/ui/button';
import { DataTable } from '@/Components/Products/DataTable';
import { Head } from '@inertiajs/react';
import { ProductItemCard } from '@/Components/Products/ProductItemCard';
import { columns } from '@/Components/Products/ProductsColumns';

export default function Products({ auth, products }) {
  console.log(products);

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

            <div className="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
              {products.map((product) => (
                <ProductItemCard key={product.id} product={product} />
              ))}
            </div>
            
            {/* <DataTable columns={columns} data={products} /> */}
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
