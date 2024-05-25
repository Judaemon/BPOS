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
        const currentTotal = getState().total;

        const itemTotal = item.price * quantity;

        currentItems.push({ ...item, quantity, itemTotal: itemTotal });

        setState({ items: currentItems, total: currentTotal + itemTotal });
      },
  },
});

export const useCart = createHook(Store);
