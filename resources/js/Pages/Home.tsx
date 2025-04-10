import {PageProps, PaginationProps, Product} from '@/types';
import { Head, Link } from '@inertiajs/react';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import ProductItem from "@/Components/App/ProductItem";

export default function Home({products}: PageProps<{products: PaginationProps<Product> }>) {

    return (
        <AuthenticatedLayout>
            <Head title="Home" />
            <div className="hero bg-gray-200 min-h-[300px] flex justify-center items-center p-6">
                <div className="hero-content text-center flex flex-col">
                    <div className="max-w-md">
                        <h1 className="text-4xl md:text-5xl font-extrabold">
                            Discover <span className="text-primary">PITCH</span><span className="italic">ed</span> deals near you
                        </h1>
                        <p className="py-4 text-lg text-gray-700">
                            Unlock savings and support local businesses by accessing exclusive discounts.
                        </p>
                        <button  className="btn btn-primary btn-lg hover: transition-all">
                            Get Started
                        </button>
                    </div>
                </div>
            </div>

            <div className="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 p-8">
                {products.data.map((product: Product) => (
                    <ProductItem product={product} key={product.id} />
                ))}
            </div>




        </AuthenticatedLayout>
    );
}
