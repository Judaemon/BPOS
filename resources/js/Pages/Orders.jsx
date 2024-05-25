import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { OrderColumn } from '@/Components/Order/OrderColumns';
import { OrderDataTable } from '@/Components/Order/OrderDataTable';
import { useCart } from '@/hooks/Cart';

export default function Products({ auth, products }) {
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
            <CartList />
            <OrderDataTable columns={OrderColumn} data={products} />
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}

const CartList = () => {
  const [state, actions] = useCart();

  if (state.items.length === 0) {
    return <p>Cart is empty</p>;
  }

  return (
    <div className="w-full">
      {state.items.map((item, index) => (
        <div className="flex w-full space-x-12" key={item.id + index}>
          <div className="flex justify-between w-7/12">
            <div>
              <p className="font-bold">{item.name}</p>
              <p className="text-xs">₱ {item.price}</p>
            </div>
            <QuantityInput item={item} />
          </div>
          <div className="w-5/12 text-right">
            <p>{item.itemTotal}</p>
          </div>
        </div>
      ))}
      <hr className="my-2" />
      <div className="flex">
        <div className="font-bold">Total</div>
        <div className="ml-auto">₱ {state.total}</div>
      </div>
    </div>
  );
};

const QuantityInput = ({ item, onChange }) => {
  return (
    <div className="flex space-x-4">
      <p>-</p>
      <p className=" font-bold">{item.quantity}</p>
      <p>+</p>
    </div>
  );
};
