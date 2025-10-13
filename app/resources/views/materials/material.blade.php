<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Download Buku PDF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white">

<div class="w-full mx-auto ">
    <div class="relative">
        <img src="https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2?q=80&w=1200&auto=format&fit=crop" alt="Hero Image" class="w-full h-48 object-cover sm:rounded-b-md">

        <div class="absolute inset-0 bg-black bg-opacity-30 sm:rounded-b-md"></div>

        <div class="absolute top-0 left-0 w-full flex items-center justify-between px-4 py-3 z-10">
            <img src="https://placehold.co/40x40" alt="Logo" class="rounded-full w-10 h-10">
            <nav class="relative">
                <div class="hidden md:flex items-center space-x-6 text-white font-medium">
                    <a href="#" class="hover:underline">Home</a>
                    <a href="#" class="hover:underline">Events</a>
                    <a href="#" class="hover:underline">Tentang Kami</a>
                </div>
                <i id="menu-button" class="fa-solid fa-bars text-xl text-white md:hidden cursor-pointer"></i>
            </nav>
        </div>

        <div id="mobile-menu" class="hidden md:hidden absolute top-16 left-0 w-full bg-[#1b2b2a] bg-opacity-90 p-4 z-20">
            <a href="#" class="block text-white py-2 text-center hover:bg-gray-700 rounded">Home</a>
            <a href="#" class="block text-white py-2 text-center hover:bg-gray-700 rounded">Events</a>
            <a href="#" class="block text-white py-2 text-center hover:bg-gray-700 rounded">Tentang Kami</a>
        </div>

        <div class="absolute bottom-4 left-4">
            <h1 class="text-white text-2xl sm:text-3xl font-bold">Download Buku PDF</h1>
        </div>
    </div>

    <div class="bg-[#faedcd] p-4 md:p-6">
        <h2 class="text-xl sm:text-2xl font-bold text-center mb-6">Kumpulan Buku PDF</h2>

        @forelse($materials as $material)
            <a href="{{ $material->url }}" target="_blank" rel="noopener noreferrer" class="block bg-[#d8f3dc] flex items-center gap-4 p-4 mb-4 rounded-lg hover:bg-[#c7f0d0] transition duration-200">
                <div class="flex-shrink-0 text-green-700 text-3xl sm:text-4xl w-[60px] text-center">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>
                <div class="flex-grow">
                    <p class="font-bold text-base sm:text-lg">{{ $material->title }}</p>
                    <span class="text-sm text-green-800 flex items-center gap-2">
                        <i class="fa-solid fa-link"></i>
                        Click to open link
                    </span>
                </div>
            </a>
        @empty
            <p class="text-center text-gray-500">No materials available at the moment.</p>
        @endforelse
@extends('base.footer')
    </div>

