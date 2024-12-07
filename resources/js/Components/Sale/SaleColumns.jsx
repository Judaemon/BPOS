import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger,
} from '@/shadcn/ui/dropdown-menu';

import { Button } from '@/shadcn/ui/button';
import { Checkbox } from '@/shadcn/ui/checkbox';
import { DataTableColumnHeader } from '../DataTable/data-table-column-header';
import { MoreHorizontal } from 'lucide-react';
import PdfDownloader from '../Pdf/DownloadPdf';
import { capitalizeFirstLetter } from '@/Helpers/StringHelper';

export const SalesColumns = [
  {
    id: 'select',
    header: ({ table }) => (
      <Checkbox
        checked={
          table.getIsAllPageRowsSelected() || (table.getIsSomePageRowsSelected() && 'indeterminate')
        }
        onCheckedChange={(value) => table.toggleAllPageRowsSelected(!!value)}
        aria-label="Select all"
      />
    ),
    cell: ({ row }) => (
      <Checkbox
        checked={row.getIsSelected()}
        onCheckedChange={(value) => row.toggleSelected(!!value)}
        aria-label="Select row"
      />
    ),
    enableSorting: false,
    enableHiding: false,
  },
  {
    accessorKey: 'id',
    header: ({ column }) => <DataTableColumnHeader column={column} title="ID" />,
  },
  {
    accessorKey: 'receipt_number',
    header: ({ column }) => <DataTableColumnHeader column={column} title="Receipt #" />,
  },
  {
    accessorKey: 'seller.name',
    header: ({ column }) => <DataTableColumnHeader column={column} title="Seller name" />,
  },
  {
    accessorKey: 'customer_name',
    header: ({ column }) => <DataTableColumnHeader column={column} title="Customer name" />,
  },
  {
    accessorKey: 'total_amount',
    header: ({ column }) => <DataTableColumnHeader column={column} title="Total amount" />,
    cell: ({ row }) => {
      const amount = parseFloat(row.getValue('total_amount'));
      const formatted = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'PHP',
      }).format(amount);

      return <div className="font-medium">{formatted}</div>;
    },
  },
  {
    accessorKey: 'payment_received',
    header: ({ column }) => <DataTableColumnHeader column={column} title="Payment received" />,
    cell: ({ row }) => {
      const amount = parseFloat(row.getValue('payment_received'));
      const formatted = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'PHP',
      }).format(amount);

      return <div className="font-medium">{formatted}</div>;
    },
  },
  {
    accessorKey: 'created_at',
    header: ({ column }) => <DataTableColumnHeader column={column} title="Sale date" />,
    filterFn: (row, columnId, filterValue, addMeta) => {
      const startDate = new Date(filterValue.startDate);
      const endDate = new Date(filterValue.endDate);
      
      if (startDate && endDate) {
        const date = new Date(row.original.created_at);
        return date >= startDate && date <= endDate;
      }

      return true;
    },
  },
  {
    accessorKey: 'products',
    header: ({ column }) => <DataTableColumnHeader column={column} title="Products" />,
    cell: ({ row }) => {
      const products = row.getValue('products');
      const id = row.getValue('id');

      return (
        <div>
          {products.map((product) => (
            <div key={`${id}_${product.id}`} className="text-sm">
              {product.name}
            </div>
          ))}
        </div>
      );
    },
  },
  {
    accessorKey: 'status',
    header: ({ column }) => <DataTableColumnHeader column={column} title="Payment status" />,
    cell: ({ row }) => {
      const status = row.getValue('status');
      const color = status === 'success' ? 'text-green-500' : 'text-red-500';

      return <div className={color}>{capitalizeFirstLetter(status)}</div>;
    },
  },
  {
    id: 'actions',
    header: () => <div className="text-le">Actions</div>,
    cell: ({ row }) => {
      const product = row.original;
      const downloadUrl = window.location.origin + '/sales/' + product.id + '/pdf';

      return (
        <div>
          <DropdownMenu>
            <DropdownMenuTrigger asChild>
              <Button variant="ghost" className="h-8 w-8 p-0">
                <span className="sr-only">Open menu</span>
                <MoreHorizontal className="h-4 w-4" />
              </Button>
            </DropdownMenuTrigger>
            <DropdownMenuContent align="end">
              <DropdownMenuLabel>Actions</DropdownMenuLabel>

              <DropdownMenuItem onClick={() => navigator.clipboard.writeText(product.id)}>
                Copy ID
              </DropdownMenuItem>

              <DropdownMenuSeparator />

              <DropdownMenuItem>
                <PdfDownloader url={downloadUrl} children={<span>Download PDF</span>} />
              </DropdownMenuItem>
            </DropdownMenuContent>
          </DropdownMenu>
        </div>
      );
    },
  },
];
