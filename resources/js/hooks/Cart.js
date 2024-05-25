import { createHook, createStore } from 'react-sweet-state';

const Store = createStore({
  initialState: {
    items: [],
  },
  actions: {
    addNewItem:
      (item, quantity) =>
      ({ setState, getState }) => {
        const currentItems = [...getState().items];

        currentItems.push({ ...item, quantity });

        setState({ items: currentItems });
      },
  },
});

export const useCart = createHook(Store);
