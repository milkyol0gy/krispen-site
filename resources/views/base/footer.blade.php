<!DOCTYPE html>
<html lang="en">
 <footer class="bg-[#1b2b2a] text-white py-8 ">

        <div class="grid place-items-center grid-cols-1 sm:grid-cols-3 text-center sm:text-left gap-8 sm:gap-4 px-6">
            <div class=" flex flex-col items-center ">
                <i class="fa-solid fa-envelope text-xl mb-2"></i>
                <p class="font-bold items-center al">Email Us</p>
                <p class="text-sm">blablablabla@gmail.com</p>
            </div>
            <div class="flex flex-col items-center ">
                <i class="fa-solid fa-phone text-xl mb-2"></i>
                <p class="font-bold">Call Us</p>
                <p class="text-sm">+62 000-0000-0000</p>
            </div>
            <div class="flex flex-col items-center sm:items-center">
                <i class="fa-solid fa-location-dot text-xl mb-2"></i>
                <p class="font-bold">Find Us</p>
                <p class="text-sm text-center">Jl. Mojoarum V No.2-4, Mojo, Gubeng, Surabaya</p>
            </div>
        </div>
        <div class="flex justify-center space-x-6 mt-8">
            <a href="#" class="hover:opacity-80"><i class="fa-brands fa-facebook text-2xl"></i></a>
            <a href="#" class="hover:opacity-80"><i class="fa-brands fa-instagram text-2xl"></i></a>
            <a href="#" class="hover:opacity-80"><i class="fa-brands fa-youtube text-2xl"></i></a>
        </div>
        <p class="text-center text-xs mt-6 text-gray-400">Gereja Kristus Pencipta</p>
    </footer>
</div>

<script>
    // JavaScript for toggling the mobile menu
    const menuButton = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    menuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
@yield('content')
</body>
</html>
