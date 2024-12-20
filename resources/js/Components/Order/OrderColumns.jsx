import { AddToCartDrawerDialog } from './AddToCartForm';
import { Checkbox } from '@/shadcn/ui/checkbox';
import { DataTableColumnHeader } from '../DataTable/data-table-column-header';
import { snakeToNormal } from '@/Helpers/StringHelper';

export const OrderColumn = [
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
    accessorKey: 'image',
    header: ({ column }) => <DataTableColumnHeader column={column} title="Image" />,
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
    },
  },
  {
    accessorKey: 'name',
    header: ({ column }) => <DataTableColumnHeader column={column} title="Name" />,
  },
  {
    accessorKey: 'stock',
    header: ({ column }) => <DataTableColumnHeader column={column} title="Stock" />,
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
    filterFn: (row, id, value) => {
      return value.includes(row.getValue(id));
    },
    cell: ({ row }) => {
      const status = row.getValue('status');

      return (
        <p
          className={`inline-block px-2 py-1 text-xs font-semibold rounded-full ${
            status === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'
          }`}
        >
          {snakeToNormal(status)}
        </p>
      );
    },
  },
  {
    id: 'actions',
    header: () => <div className="text-le">Actions</div>,
    cell: ({ row }) => {
      const product = row.original;

      return (
        <div>
          <AddToCartDrawerDialog item={product} />
        </div>
      );
    },
  },
];
