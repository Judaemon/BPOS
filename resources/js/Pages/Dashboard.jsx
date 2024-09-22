import { Head, Link } from '@inertiajs/react';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { SalesChart } from '../Components/Sale/Charts/Chart';
import { hasRole } from '@/lib/permissions';

export default function Dashboard({ auth, chartData }) {
    console.log(chartData.current_report);
    
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white p-6 grid gap-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="text-gray-900 dark:text-gray-100">You're logged in!</div>
                        
                        {hasRole('admin') && (
                            <div>
                                <Link
                                    href={route('register')}
                                    className="rounded-md text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Add new user!
                                </Link>
                            </div>
                        )}

                        {hasRole('admin') && (
                            <div className="grid grid-cols-3 gap-4 text-black">
                                <SalesChart data={chartData.current_report}/>
                                <SalesChart data={[]}/>
                                <SalesChart data={[]}/>
                            </div>
                        )}


                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
