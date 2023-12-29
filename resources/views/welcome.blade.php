<x-app-layout>
    <x-navbar />
    <main class="min-h-screen max-w-screen overflow-hidden">
        <section class="bg-red-500 min-h-screen flex justify-start md:justify-center pt-16 md:pt-0">
            <article class="md:m-28 relative border h-96 w-full block md:flex">
                <figure class="border w-auto relative flex justify-center items-center">
                    <img src="{{ asset('storage/images/sanmateo.png') }}" alt="" class="h-96 md:w-96">
                </figure>
                <figure class="flex md:items-center justify-center border p-2 bg-blue-400 h-full">
                    <div class="block">
                        <div class="uppercase font-poppins font-extrabold tracking-tight text-center md:text-start">
                            <span class="text-3xl">welcome to</span>
                        </div>
                        <div class="uppercase font-poppins font-extrabold tracking-tight text-center md:text-start">
                            <span class="text-5xl">barangay san mateo</span>
                        </div>
                        <div class="capitalize font-poppins font-normal tracking-tighter text-center md:text-start pt-5">
                            <span class="text-base">butuan city, agusan del norte</span>
                        </div>
                        <div class="capitalize font-poppins font-normal tracking-tighter text-center md:text-start">
                            <span class="text-base">open hours of barangay: Monday - Friday (8AM - 5PM) </span>
                        </div>
                        <div class=" font-poppins font-medium tracking-tight text-center md:text-start">
                            <span class="text-base">sanmateo@gmail.com / +63 909 741 2328 </span>
                        </div>
                        <div class="">
                            <button type="button" class="mt-6 py-3 px-4 inline-flex items-center gap-x-2 text-sm uppercase tracking-tight font-bold rounded-sm border border-transparent bg-[#f5f5f5] text-gray-800 hover:bg-gray-900 disabled:opacity-50 disabled:pointer-events-none ">
                                About Us
                            </button>
                        </div>
                    </div>
                </figure>
            </article>
        </section> 
        <section class="min-h-screen flex border-4">
            <article class="md:mx-28 my-6 h-auto border bg-green-400 w-full">
                <figure class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="h-full w-full bg-red-100">
                        <img src="{{ asset('storage/images/join.jpg') }}" alt="" class="px-4">
                    </div>
                    <div class="h-full w-full bg-red-100 block py-8">
                        <figure class="pl-[75px] flex items-center gap-x-4">
                            <hr class="border-t-2 w-10 border-[#07a9df] rounded-lg">
                            <span class="font-poppins tracking-tight text-[#3a3d3e] font-medium">About Us</span>
                        </figure>
                        <figure class="pl-[75px] block">
                            <div class="font-roboto font-medium pt-6">
                                <span class="text-5xl text-[#3a3d3e] tracking-tight">
                                    if you change your city, 
                                    you're changing the world.
                                </span>
                            </div>
                            <div class="font-poppins font-medium mt-5">
                                <span class="text-[#3a3d3e]">
                                    Barangay San Mateo is determined to address everything that hinder its way to be the best.
                                </span>
                            </div>                           
                        </figure>
                        <figure x-data="{ activeTab: 'mission' }" class="p-6 bg-indigo-400">
                            <div class="flex justify-start gap-x-2 pl-[55px]">
                                <button @click="activeTab = 'mission'" :class="{ 'bg-white text-gray-800 shadow-xl': activeTab === 'mission', 'bg-gray-300 text-gray-500': activeTab !== 'mission' }" type="button" class="py-3.5 px-6 inline-flex items-center gap-x-2 text-sm font-medium rounded-sm border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                    <p class="font-semibold font-poppins tracking-tight text-base text-[#3a3d3e]">
                                        Our Mission
                                    </p>
                                </button>
                                <button @click="activeTab = 'vision'" :class="{ 'bg-white text-gray-800 shadow-xl': activeTab === 'vision', 'bg-gray-300 text-gray-500': activeTab !== 'vision' }" type="button" class="py-3.5 px-6 inline-flex items-center gap-x-2 text-sm font-medium rounded-sm border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                    <p class="font-semibold font-poppins tracking-tight text-base text-[#3a3d3e]">
                                        Our Vision
                                    </p>
                                </button>
                                <button @click="activeTab = 'goal'" :class="{ 'bg-white text-gray-800 shadow-xl': activeTab === 'goal', 'bg-gray-300 text-gray-500': activeTab !== 'goal' }" type="button" class="py-3.5 px-6 inline-flex items-center gap-x-2 text-sm font-medium rounded-sm border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                    <p class="font-semibold font-poppins tracking-tight text-base text-[#3a3d3e]">
                                        Our Goal
                                    </p>
                                </button>
                            </div>
                            <div x-show="activeTab === 'mission'" class="flex justify-start pl-[55px] pt-6 font-poppins text-base tracking-tight text-[#3a3d3e]">
                                A Barangay that is God-centered, competent, orderly, honest, peaceful, credible, gender responsive and abides the Code of Conduct.
                            </div>
                            <div x-show="activeTab === 'vision'" class="flex justify-start pl-[55px] pt-6 font-poppins text-base tracking-tight text-[#3a3d3e]">
                                We exercise transparency, integrity, professionalism, efficiency and most of all we conduct free services because as Public Servants. We are accountable to the residents of Barangay San Mateo.
                            </div>
                            <div x-show="activeTab === 'goal'" class="flex justify-start pl-[55px] pt-6 font-poppins text-base tracking-tight text-[#3a3d3e]">
                                Barangay San Mateo aims to be efficient in serving the public because Public Office is a Public Trust and must at all times be accountable to the people, serve them with utmost responsibility, loyalty and efficiency, act with patriotism and justice and lead modest lives. Thus, Barangay San Mateo is determined to address everything that hinder its way to be the best.
                            </div>
                            <div class="flex justify-between pl-[55px] pt-6 w-full">
                                <div class="w-full block">
                                    <div class="font-medium font-poppins tracking-tight capitalize">
                                        <span class="text-gray-800">
                                            call to ask any questions
                                        </span>
                                    </div>
                                    <div class="font-medium font-poppins tracking-tighter capitalize">
                                        <span class="text-blue-800 text-2xl">
                                            (046) 884 6599
                                        </span>
                                    </div>
                                </div>
                                <div class="w-full block">
                                    <div class="capitalize font-semibold font-roboto flex justify-end">
                                        <span class="text-2xl">
                                            san mateo
                                        </span>
                                    </div>
                                    <div class="capitalize font-medium font-roboto flex justify-end">
                                        <span class="text-base">
                                            butuan city
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                </figure>
            </article>
        </section>     
        <section class="min-h-screen block">
            <figure class="flex justify-center">
                <span class="text-lg capitalize font-semibold font-roboto text-[#3a3d3e]">
                    barangay san mateo
                </span>
            </figure>
            <figure class="flex justify-center">
                <span class="text-5xl font-roboto text-[#3a3d3e] font-semibold capitalize">
                    meet our council
                </span>
            </figure>
            <figure class="mx-32 mt-8">
                <div data-hs-carousel='{
                        "loadingClasses": "opacity-0",
                        "isAutoPlay": false
                    }' class="relative">
                    <div class="hs-carousel relative overflow-hidden w-full min-h-[400px] rounded-lg">
                        <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                            <div class="hs-carousel-slide grid grid-cols-3 gap-6 ">
                                <!-- Card 1 -->
                                <div class="flex justify-center h-full bg-gray-100 p-6 border">
                                    <div class="block m-8 border w-full">
                                        <div class="">1</div>
                                        <div class="">1</div>
                                    </div>
                                </div>
                                <!-- Card 2 -->
                                <div class="flex justify-center h-full bg-gray-100 p-6 border">
                                    <span class="self-center text-4xl transition duration-700">Card 2</span>
                                </div>
                                <!-- Card 3 -->
                                <div class="flex justify-center h-full bg-gray-100 p-6 border">
                                    <span class="self-center text-4xl transition duration-700">Card 3</span>
                                </div>
                            </div>

                            <div class="hs-carousel-slide grid grid-cols-3 gap-6">
                                <!-- Card 1 -->
                                <div class="flex justify-center h-full bg-gray-200 p-6">
                                    <span class="self-center text-4xl transition duration-700">Card 1</span>
                                </div>
                                <!-- Card 2 -->
                                <div class="flex justify-center h-full bg-gray-200 p-6">
                                    <span class="self-center text-4xl transition duration-700">Card 2</span>
                                </div>
                                <!-- Card 3 -->
                                <div class="flex justify-center h-full bg-gray-200 p-6">
                                    <span class="self-center text-4xl transition duration-700">Card 3</span>
                                </div>
                            </div>
                            <div class="hs-carousel-slide grid grid-cols-3 gap-6">
                                <!-- Card 1 -->
                                <div class="flex justify-center h-full bg-gray-300 p-6">
                                    <span class="self-center text-4xl transition duration-700">Card 1</span>
                                </div>
                                <!-- Card 2 -->
                                <div class="flex justify-center h-full bg-gray-300 p-6">
                                    <span class="self-center text-4xl transition duration-700">Card 2</span>
                                </div>
                                <!-- Card 3 -->
                                <div class="flex justify-center h-full bg-gray-300 p-6">
                                    <span class="self-center text-4xl transition duration-700">Card 3</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/[.1]">
                        <span class="text-2xl" aria-hidden="true">
                        <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                        </span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button type="button" class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/[.1]">
                        <span class="sr-only">Next</span>
                        <span class="text-2xl" aria-hidden="true">
                        <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                        </span>
                    </button>

                    <div class="hs-carousel-pagination flex justify-center mt-6 bottom-3 start-0 end-0 space-x-1">
                        <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 w-8 h-2 border border-gray-400 cursor-pointer"></span>
                        <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 w-8 h-2 border border-gray-400 cursor-pointer"></span>
                        <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 w-8 h-2 border border-gray-400 cursor-pointer"></span>
                    </div>
                </div>
            </figure>
        </section>
    </main>
    <x-footer />
</x-app-layout>
