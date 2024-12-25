import { Link } from "@inertiajs/react";

export default function Show({ product }) {
    return (
        <div className="container mx-auto p-6">
            <div className="flex justify-between items-center mb-6">
                <h1 className="text-3xl font-bold text-gray-800">{product.name}</h1>
                <Link
                    href="/products"
                    className="text-blue-500 hover:text-blue-700 underline"
                >
                    Back to Products
                </Link>
            </div>
            
            <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                <img
                   src={product.image || "https://via.placeholder.com/600x400"}
                    alt={product.name}
                    className="w-full h-72 object-cover rounded-lg shadow-lg"
/>

                </div>
                
                <div>
                    <h2 className="text-2xl font-semibold text-gray-800 mb-4">Description</h2>
                    <p className="text-gray-700 mb-4">{product.description}</p>
                    <p className="text-lg font-bold text-green-600 mb-4">Price: ${product.price}</p>
                    
                </div>
            </div>
        </div>
    );
}
