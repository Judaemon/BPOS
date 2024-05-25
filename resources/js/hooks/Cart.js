import { createHook, createStore } from 'react-sweet-state';

const Store = createStore({
  initialState: {
    items: [],
    total: 0,
  },
  actions: {
    addNewItem:
      (item, quantity) =>
      ({ setState, getState }) => {
        const currentItems = [...getState().items];

        if (currentItems.find((i) => i.id === item.id)) {
          window.alert('Item already exists in cart');
          return;
        }
        const currentTotal = getState().total;

        const itemTotal = item.price * quantity;

        currentItems.push({ ...item, quantity, itemTotal: itemTotal });

        setState({ items: currentItems, total: currentTotal + itemTotal });
      },
    updateQuantity:
      (item, newQuantity) =>
      ({ setState, getState }) => {
        const currentItems = [...getState().items];

        const itemIndex = currentItems.findIndex((i) => i.id === item.id);

        if (itemIndex < 0) {
          window.alert('Item does not exist in cart');
          return;
        }

        const previousItemTotal = currentItems[itemIndex].itemTotal;
        const itemTotal = item.price * newQuantity;

        // Update the item in the array
        currentItems[itemIndex] = {
          ...currentItems[itemIndex],
          quantity: newQuantity,
          itemTotal: itemTotal,
        };

        // Recompute the total
        const currentTotal = getState().total;
        console.log(currentTotal, previousItemTotal, itemTotal);
        const newTotal = currentTotal - previousItemTotal + itemTotal;

        setState({ items: currentItems, total: newTotal });
      },
    removeItem:
      (item) =>
      ({ setState, getState }) => {
        const currentItems = [...getState().items];

        const itemIndex = currentItems.findIndex((i) => i.id === item.id);

        if (itemIndex < 0) {
          window.alert('Item does not exist in cart');
          return;
        }

        const currentTotal = getState().total;
        const itemTotal = currentItems[itemIndex].itemTotal;

        currentItems.splice(itemIndex, 1);

        setState({ items: currentItems, total: currentTotal - itemTotal });
      },
  },
});

export const useCart = createHook(Store);
