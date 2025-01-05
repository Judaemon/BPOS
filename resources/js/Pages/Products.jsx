import { DataTable, MemoizedProductDialog } from '@/Components/Products/DataTable';
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectLabel,
  SelectTrigger,
  SelectValue,
} from '@/shadcn/ui/select';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@/shadcn/ui/button';
import { Head } from '@inertiajs/react';
import { Input } from '@/shadcn/ui/input';
import { PRODUCT_STATUS } from '@/data/status';
import { ProductItemCard } from '@/Components/Products/ProductItemCard';
import TablePagination from '@/Components/UI/Pagination';
import { columns } from '@/Components/Products/ProductsColumns';
import { fetchProducts } from '@/Api/ProductAPI';
import { useQuery } from '@tanstack/react-query';
import { useState } from 'react';

export default function Products({ auth }) {
  const [search, setSearch] = useState('');
  const [status, setStatus] = useState('');
  const [page, setPage] = useState(1);
  const [perPage, setPerPage] = useState(12);

  const {
    data: productsTable,
    isLoading,
    isError,
  } = useQuery({
    queryKey: ['products', { search, status, page, perPage }],
    queryFn: () => fetchProducts({ search, product_status: status, page, per_page: perPage }),
    refetchOnWindowFocus: false,
    placeholderData: (previousData, previousQuery) => previousData,
  });

  if (isLoading) {
    return <div>Loading...</div>;
  }

  if (isError) {
    return <div>Error fetching data</div>;
  }

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

            <div>
              {/* search */}
              <div className="flex items-center justify-between">
                <div className="flex items-center space-x-2">
                  <Input
                    placeholder="Search product..."
                    value={search}
                    onChange={(event) => setSearch(event.target.value)}
                    className="h-8 w-[150px] lg:w-[250px]"
                  />
                  <div>
                    <Select value={status} onValueChange={(value) => setStatus(value)}>
                      <SelectTrigger className="w-[180px]">
                        <SelectValue placeholder="Select status" />
                      </SelectTrigger>
                      <SelectContent>
                        <SelectGroup>
                          <SelectLabel>Status</SelectLabel>
                          {PRODUCT_STATUS.map((status) => (
                            <SelectItem key={status.value} value={status.value}>
                              {status.label}
                            </SelectItem>
                          ))}
                        </SelectGroup>
                      </SelectContent>
                    </Select>
                  </div>

                  {/* clear */}
                  {(search || status) && (
                    <div>
                      <Button
                        onClick={() => {
                          setStatus('');
                          setSearch('');
                        }}
                        className=""
                        size="sm"
                      >
                        Clear
                      </Button>
                    </div>
                  )}
                </div>

                <MemoizedProductDialog action="creating" />
              </div>
            </div>

            <div className="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
              {productsTable.data.map((product) => (
                <ProductItemCard key={product.id} product={product} />
              ))}
            </div>

            <div className="flex w-full justify-end">
              <TablePagination table={productsTable} setPage={setPage} setPerPage={setPerPage} />
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
