import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';

export default function Guest({ children }) {
  return (
    <main>
      <div
        className="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900"
        style={{
          backgroundImage: `url('images/website/logo_blur.png')`,
          backgroundSize: 'cover',
          backgroundPosition: 'center',
          backgroundRepeat: 'no-repeat',
          backgroundColor: 'rgba(0, 0, 0, 0.5)',
          backgroundBlendMode: 'overlay',
        }}
      >
        <div>
          <Link href="/">
            <ApplicationLogo width="w-36" height="h-36" />
          </Link>
        </div>

        <div className="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
          {children}
        </div>
      </div>
      <Footer />
    </main>
  );
}

const Footer = () => {
  return (
    <footer className="bg-gray-800 text-gray-300 py-6">
      <div className="container mx-auto flex flex-col sm:flex-row justify-center items-center">
        <div className="text-center">
          <h5 className="text-lg font-semibold">BPOS - Basic Point Of Sail</h5>
          <p className="text-sm">© 2024 All Rights Reserved.</p>
        </div>
      </div>
    </footer>
  );
};
