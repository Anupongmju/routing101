import { Link } from "@inertiajs/react";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

export default function Index({ Products }) {
    return (
        <AuthenticatedLayout>
        <div className="container mx-auto p-6"> 
            <h1 className="text-3xl font-bold text-center mb-8">Product List</h1>  
            <ul className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                {Products.map((product) => (
                    <li key={product.id} className="border rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div className="relative">
                        <img
                             onClick={() => window.location.href = `/products/${product.id}`} 
                            src={product.image || "https://via.placeholder.com/600x400"}
                            alt={product.name} 
                            className="w-full h-72 object-cover rounded-lg shadow-lg"
                        />

                        </div>
                        <div className="p-4">
                            <h2 className="text-xl font-semibold text-gray-800">{product.name}</h2>
                            <p className="text-gray-600 mt-2">{product.description}</p>
                            <p className="text-lg font-bold text-green-600 mt-2">${product.price}</p>
                            <Link
                                href={`/products/${product.id}`}
                                className="text-blue-500 hover:text-blue-700 underline mt-4 inline-block"
                            >
                                View Details
                            </Link>
                        </div>
                    </li>
                ))}
            </ul>
        </div>
        </AuthenticatedLayout>
    );
}
