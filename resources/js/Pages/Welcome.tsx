import { PageProps } from '@/types';
import { Head, Link } from '@inertiajs/react';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";

export default function Welcome({
    auth,
    laravelVersion,
    phpVersion,
}: PageProps<{ laravelVersion: string; phpVersion: string }>) {
    const handleImageError = () => {
        document
            .getElementById('screenshot-container')
            ?.classList.add('!hidden');
        document.getElementById('docs-card')?.classList.add('!row-span-1');
        document
            .getElementById('docs-card-content')
            ?.classList.add('!flex-row');
        document.getElementById('background')?.classList.add('!hidden');
    };

    return (
        <AuthenticatedLayout>
            <Head title="Welcome" />
            <div className="hero bg-gray-200 min-h-[300px] flex justify-center items-center p-6">
                <div className="hero-content text-center flex flex-col">
                    <div className="max-w-md">
                        <h1 className="text-4xl md:text-5xl font-extrabold">
                            Discover <span className="text-primary">PITCH</span><span className="italic">ed</span> deals near you
                        </h1>
                        <p className="py-4 text-lg text-gray-700">
                            Unlock savings and support local businesses by accessing exclusive discounts.
                        </p>
                        <button className="btn btn-primary btn-lg hover: transition-all">
                            Get Started
                        </button>
                    </div>
                </div>
            </div>


        </AuthenticatedLayout>
    );
}
