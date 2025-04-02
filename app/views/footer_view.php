<footer class="bg-black text-white text-center p-8 mt-6">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-6 text-sm text-left">
            <div>
                <h3 class="text-lg font-bold mb-2">About Us</h3>
                <p>InzoziMart is your go-to e-commerce platform for high-quality products at unbeatable prices. Shop with us today!</p>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-2">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:underline">Home</a></li>
                    <li><a href="#" class="hover:underline">Shop</a></li>
                    <li><a href="#" class="hover:underline">Cart</a></li>
                    <li><a href="#" class="hover:underline">Contact Us</a></li>
                    <li><a href="admin" class="hover:underline">Admin</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-2">Stay Connected with Us</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:underline">Facebook</a></li>
                    <li><a href="#" class="hover:underline">Twitter</a></li>
                    <li><a href="#" class="hover:underline">Instagram</a></li>
                    <li><a href="#" class="hover:underline">LinkedIn</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-2">Newsletter</h3>
                <p>Subscribe to our newsletter for updates on new arrivals and exclusive deals.</p>
                <div class="flex mt-2">
                    <input type="email" placeholder="Your email" class="w-full p-2 text-black rounded-l-lg border border-gray-300 focus:outline-none">
                    <button class="bg-fuchsia-400 text-white px-4 py-2 rounded-r-lg hover:bg-fuchsia-700 transition-all">Subscribe</button>
                </div>
            </div>
        </div>
        <div class="flex justify-center space-x-6 mt-6">
            <p class="">&copy; 2025 InzoziMart. All rights reserved</p>
            <a href="#" class="hover:underline">Privacy Policy</a>
            <a href="#" class="hover:underline">Terms of Service</a>
            <a href="#" class="hover:underline">Refund Policy</a>
        </div>
    </footer>

    <script>

     // Show the modal on page load
    //  window.onload = function() {
    //         document.getElementById('myModal').classList.remove('hidden');
    //     };

        // Close the modal when the close button is clicked
        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('myModal').classList.add('hidden');
        });

    const avatarButton = document.getElementById('avatar-button');
    const dropdownMenu = document.getElementById('dropdown-menu');

    // Toggle the visibility of the dropdown on click
    avatarButton.addEventListener('click', function (event) {
        event.stopPropagation();  // Prevent the click event from bubbling up
        dropdownMenu.classList.toggle('hidden');
    });

    // Close dropdown if clicking outside
    document.addEventListener('click', function (event) {
        if (!avatarButton.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
</script>
</body>
</html>
