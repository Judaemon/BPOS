import { Button } from '@/shadcn/ui/button';
import React, { useEffect } from 'react';

const PdfDownloaderButton = ({ url, children }) => {
  const handleClick = () => {
    const newTab = window.open(url, '_blank');

    if (newTab) {
      setTimeout(() => {
        newTab.close();
      }, 2000);
    }
  };

  return (
    <Button onClick={handleClick}>
      {children}
    </Button>
  );
};

export default PdfDownloaderButton;
