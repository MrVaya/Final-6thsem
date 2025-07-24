<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Product Details') }}
            </h2>
            <div class="space-x-4">
                <a href="{{ route('products.edit', $product) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Edit Product
                </a>
                <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            @if($product->image)
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-96 object-cover rounded-lg shadow-md">
                            @else
                                <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <span class="text-gray-400 text-lg">No image available</span>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
                            
                            <div class="mb-6">
                                <h2 class="text-xl font-semibold text-gray-700 mb-2">Price</h2>
                                <p class="text-2xl font-bold text-blue-600">{{ $product->formatted_price }}</p>
                            </div>

                            <div class="mb-6">
                                <h2 class="text-xl font-semibold text-gray-700 mb-2">Stock</h2>
                                <p class="text-lg text-gray-600">{{ $product->stock }} units available</p>
                            </div>

                            <div class="mb-6">
                                <h2 class="text-xl font-semibold text-gray-700 mb-2">Category</h2>
                                <p class="text-lg text-gray-600">{{ $product->category }}</p>
                            </div>

                            <div class="mb-6">
                                <h2 class="text-xl font-semibold text-gray-700 mb-2">Description</h2>
                                <p class="text-lg text-gray-600 whitespace-pre-line">{{ $product->description ?: 'No description available.' }}</p>
                            </div>

                            <div class="mt-8">
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this product?')">
                                        Delete Product
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 