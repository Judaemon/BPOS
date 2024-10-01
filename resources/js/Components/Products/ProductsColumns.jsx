import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger,
} from '@/shadcn/ui/dropdown-menu';
import { Image, MoreHorizontal } from 'lucide-react';

import { Button } from '@/shadcn/ui/button';
import { Checkbox } from '@/shadcn/ui/checkbox';
import { DataTableColumnHeader } from '../DataTable/data-table-column-header';
import { PRODUCT_STATUS } from '@/data/status';
import ProductDialog from './ProductDialog';

export const columns = [
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
    accessorKey: 'name',
    header: ({ column }) => <DataTableColumnHeader column={column} title="Name" />,
  },
  {
    accessorKey: 'image',
    header: ({ column }) => <DataTableColumnHeader column={column} title="image" />,
    cell: ({ row }) => {
      const image = row.getValue('image');

      if (!image) {
        return (
          <div className="flex gap-1">
            <Image className="h-4 w-4" /> No image
          </div>
        );
      }

      return <img src={`${image}`} alt="product" className="w-8 h-8 rounded-full" />;
    }
  },
  {
    accessorKey: 'stock',
    header: ({ column }) => <DataTableColumnHeader column={column} title="Stock" />,
  },
  {
    accessorKey: 'cost',
    header: ({ column }) => <DataTableColumnHeader column={column} title="Cost" />,
    cell: ({ row }) => {
      const amount = parseFloat(row.getValue('cost'));
      const formatted = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'PHP',
      }).format(amount);

      return <div className="font-medium">{formatted}</div>;
    },
  },
  {
    accessorKey: 'price',
    header: ({ column }) => <DataTableColumnHeader column={column} title="Price" />,
    cell: ({ row }) => {
      const amount = parseFloat(row.getValue('price'));
      const formatted = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'PHP',
      }).format(amount);

      return <div className="font-medium">{formatted}</div>;
    },
  },
  {
    accessorKey: 'status',
    header: ({ column }) => <DataTableColumnHeader column={column} title="Status" />,
    cell: ({ row }) => {
      const statusValue = row.getValue('status');
  
      const status = PRODUCT_STATUS.find((item) => item.value === statusValue);
  
      return <div className="font-medium">{status ? status.label : statusValue}</div>;
    },
  },
  {
    id: 'actions',
    header: () => <div className="text-le">Actions</div>,
    cell: ({ row }) => {
      const product = row.original;
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

              <div className="flex flex-col gap-2">
                <ProductDialog
                  product={product}
                  setProduct={() => {
                    console.log('set product');
                  }}
                  action="viewing"
                  dialogTrigger={<div className="pl-2 text-left">View</div>}
                />
                <ProductDialog
                  product={product}
                  setProduct={() => {
                    console.log('set product');
                  }}
                  action="updating"
                  dialogTrigger={<div className="pl-2 text-left">Update</div>}
                />
              </div>
            </DropdownMenuContent>
          </DropdownMenu>
        </div>
      );
    },
  },
];
